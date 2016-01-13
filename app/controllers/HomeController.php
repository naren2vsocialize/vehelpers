<?php

class HomeController extends BaseController {
	private $_user;
	public function __construct() {
		$this->_user = \Auth::user();
	}
	protected function fileValidator(array $data)
	{
		return Validator::make($data, [
            'file' => 'required'
            ]);
	}
	protected function upload()
	{
		$validator = $this->fileValidator(Input::all());

		if( $validator->passes() ){
			if( $this->_user->download_count ) {
				\Excel::selectSheetsByIndex(0)->load( Input::get('file'), function($reader) {
					$finalHtml = '';
					$currentTime = date('d-m-Y_His');
					mkdir($currentTime);
					foreach ($reader->toArray() as $row) {
						$html = "
			<style>
				.page-break {
	    			page-break-after: always;
				}
				.outer-container {
					margin: 0% auto;
					border: 1px solid black;
					text-align: center;
					height: 99%;
				}
				.subject-container {
					font-weight: bold;
					margin-top: 30px;
				}
				.content-container {
					text-align: left;
					padding: 10px;
					margin-top: 50px;
				}
				ol {
					text-align: left;
				}
				ol li{
					padding-bottom: 40px;
				}
			</style>
			<div class='outer-container'>
				
			 		<p class='subject-container'>Subject: NOTICE UNDER SECTION 138 OF NEGOTIABLE INSTRUMENT ACT READ WITH SECTION 420 OF INDIAN PENAL CODE</p>

					<p class='content-container'>
						On behalf of and under instructions of my client <u>$row[name]</u> S/o__________ R/o __________ (hereinafter referred to as &quot;my client&quot;). I do hereby serve you with the following legal notice:

						<ol>
							<li>That my client, an engineering student, while looking for job paid Rs $row[amount] to you for assured placement in an MNC, last year.</li>
							<li>That thereafter my client issued a number of reminders to you for placement, but still no opportunity was provided to him, i.e. as you were unable to fulfill the promise as to placement of my client. Therefore, it was decided between you and my client that the amount of Rs $row[amount] should be refunded and as a result you issued him a cheque no $row[cheque_number] dated $row[cheque_date].</li>
							<li>That the said cheque was presented by my client to State Bank of India, Noida for credit in his account in the month of December 2011 itself, but it bounced due to insufficient funds. And my client contacted you and was assured of cash in lieu of bounced cheque, therefore, my client did not take legal action earlier. My client thereafter again requested many a time to you for the payment of the said cheque amount by telephone and/or through personal visit of his representative, but in vain.</li>
							<li>That in April 2012, my client again tried depositing the cheque with State Bank of India, Mysore but it was again returned as unpaid with remarks &#45; Funds Insufficient, vide Syndicate Bank memo dated 19 April 2012.</li>
							<li>That in the facts and circumstances created by you my above said client left with no alternative except to serve you the present notice and calling upon all of you to make the payment of the above mentioned cheque amount totaling Rs $row[amount]/- (Rupees Ten Thousand only) including bouncing charges in cash with interest @ 24% per annum within 15 days of the receipt of this notice failing which my client shall be constrained to institute against you a criminal complaint under section 138 of the Negotiable Instrument Act read with section 420 of IPC where under you could be sentenced to undergo imprisonment of the two years and also pay the fine equivalent of the double amount of the above mentioned cheque as well as legal charges of this notice of Rs 2100/-</li>
							<li>That a copy of this notice retained in my office for further reference /record and legal action.</li>
						</ol>
					</p>
			</div>";
						$finalHtml.= $html . "<div class='page-break'></div>";
						\PDF::loadHTML($html)->setPaper('a4')->setOrientation('portrait')->setWarnings(false)->save($currentTime .'/'. $row["name"] . '_' . $row['cheque_number'] . '.pdf');
					}

					\PDF::loadHTML($finalHtml)->setPaper('a4')->setOrientation('portrait')->setWarnings(false)->save($currentTime .'/'. $currentTime . '.pdf');

					// Here we choose the folder which will be used.
					$dirName = public_path() . '/' . $currentTime;

					// Choose a name for the archive.
					$zipFileName = $this->_user->email . '_' . $currentTime . '.zip';

					// Create ".zip" file in public directory of project.
					$zip = new ZipArchive;
					if ($zip->open(public_path() . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {

						// Copy all the files from the folder and place them in the archive.
						foreach (glob($dirName . '/*') as $fileName) {
							$file = basename($fileName);
							$zip->addFile($fileName, $file);
						}
						$zip->close();

						$headers = array(
                'Content-Type' => 'application/octet-stream',
						);
					} else {
						echo 'failed';
					}

					$filename = $this->_user->email . '_' . $currentTime . '.zip';
					$filepath = $_SERVER["DOCUMENT_ROOT"];
 					ob_start();
					// http headers for zip downloads
					header("Pragma: public");
					header("Expires: 0");
					header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
					header("Cache-Control: public");
					header("Content-Description: File Transfer");
					header("Content-type: application/octet-stream");
					header("Content-Disposition: attachment; filename=\"".$filename."\"");
					header("Content-Transfer-Encoding: binary");
					header("Content-Length: ".filesize($filepath."/".$filename));
					@readfile($filepath . "/" . $filename);
					ob_end_flush();
					\File::deleteDirectory($currentTime);
					\File::delete($this->_user->email . '_' . $currentTime . '.zip');

					// reader methods
						
					$this->_user->download_count = $this->_user->download_count - 1;
					$this->_user->save();

				});
			}
			else {
				return Redirect::to("home")->with('message', 'Your maximum download limit 3, exceeded in beta version.  Please subscribe to use this feature.');
			}
		}
		return Redirect::to("home")->withErrors($validator->messages());
	}


	public function showWelcome()
	{
		return View::make('hello');
	}
}
