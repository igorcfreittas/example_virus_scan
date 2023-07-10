<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpMussel\Core\Loader;
use \phpMussel\Core\Scanner;

use Illuminate\Support\Facades\Storage;

class ScanController extends Controller
{
    private $loader;
    private $scanner;
    private $fileDebugOutput;

    private $config = [
        'configuration' => 'phpmussel.yml',
        'cache' => '/phpmussel-cache',
        'quarantine' => '/phpmussel-quarantine',
        'signatures' => '/phpmussel-signatures',
    ];

    public function __construct(Loader $loader, Scanner $scanner)
    {
        $root = base_path();
        $loader = new Loader(
            $root . $this->config['configuration'],
            $root . $this->config['cache'],
            $root . $this->config['quarantine'],
            $root . $this->config['signatures']
        );
        $scanner = new Scanner($loader);
        $scanner->setScanDebugArray($this->fileDebugOutput);

        $this->loader = $loader;
        $this->scanner = $scanner;
    }

    public function redirectTo() //just to redirect if call with GET on browser tab
    {
        return view('form_scan');
    }

    public function scan(Request $request, $isView = 0)
    {
        $file = $request->file('file');
        if (!$file) {
            return response(['message' => 'Informe ao menos um arquivo para upload.'], 401);
        }

        $fileName = Storage::put('', $file);
        $filePath = Storage::path($fileName);

        $scanResult = $this->scanner->scan($filePath);

        $response = json_encode([
            'origin' => $this->loader->Configuration['core']['ipaddr'],
            'objects_scanned' => $this->loader->InstanceCache['ObjectsScanned'] ?? 0,
            'detections_count' => $this->loader->InstanceCache['DetectionsCount'] ?? 0,
            'scan_errors' => $this->loader->InstanceCache['ScanErrors'] ?? 1,
            'hash_references' => $this->loader->HashReference,
            'why_flagged' => implode($this->loader->L10N->getString('grammar_spacer'), $this->loader->ScanResultsText),
            'extended_original_result' => $scanResult,
            'file_debug_output' => $this->fileDebugOutput,
        ]);

        Storage::delete($fileName);

        $redirectToViewWithResponse = $isView;
        if ($redirectToViewWithResponse) {
            return view('form_scan', ['response' => $response]);
        }

        return response($response, 200);
    }
}
