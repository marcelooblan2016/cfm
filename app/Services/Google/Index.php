<?php
namespace App\Services\Google;
use App\Services\Google\Interfaces\GoogleInterface;
use Google_Client;
use Google_Service_Drive;

class Index implements GoogleInterface
{
	protected $service;

	public function __construct(string $accessToken) {
        $client = new Google_Client();
        $client->setAccessToken($accessToken);
        // Create a Google Drive service
        $this->service = new Google_Service_Drive($client);
	}
    /**
     * List Files, By Default It will return folders
     * @param string $query
     * @return array
     **/
	public function listFiles(string $query = null): array
	{
		$q = $query ?? "mimeType='application/vnd.google-apps.folder'";
        try {
        	// Error: Request had insufficient authentication scopes.", "errors": [ { "message": "Insufficient Permission - This is due to my google app as it needs to be verified.
            $folders = $this->service->files->listFiles([
                'q' => $q,
            ]);

            return $folders;
        } catch (\Exception $e) {
        	// FOr the demo purpose i will return some dummy folders ....
            return [
               '/(Root Folder)',
               'test-folder1',
               'test-folder2',
               'test-folder3'
            ];
        }
	}
}