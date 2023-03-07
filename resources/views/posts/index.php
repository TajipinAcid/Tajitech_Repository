<?php
require_once('/var/www/sample/vendor/autoload.php');
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// S3関連
define('S3_KEY'    ,'＜アクセスキー＞');
define('S3_SECRET' ,'＜シークレットアクセスキー＞');
define('S3_BUCKET' ,'＜バケット名＞');

$source_file = @$_FILES['source_file'];
if ($source_file) {
	if ($source_file['size'] && $source_file['size'] > 0) {
		upload($source_file);
	}
}

/**
 * S3へアップロード
 */
function upload($source_file)
{
	try {
		// S3Clientインスタンス生成
		$s3Client = S3Client::factory([
			'credentials' => [
				'key'    => S3_KEY,
				'secret' => S3_SECRET,
			],
			'region'  => 'ap-northeast-1',
			'version' => 'latest',
		]);

		$option = [
			'ACL'        => 'public-read',
			'Bucket'     => S3_BUCKET,
			'Key'        => '＜ファイルディレクトリ＞/＜ファイル名＞',
			'SourceFile' => $source_file['tmp_name'],
		];

		$finfo = new finfo();
		$file_name = $source_file['tmp_name'];
		$mime_type = $finfo->file($file_name, FILEINFO_MIME_TYPE);
		if (strlen($mime_type ) > 0) {
			$option['ContentType']  = $mime_type ;
			$option['CacheControl'] = 'max-age=300';
		}

		$result = $s3Client->putObject($option);

		// 結果を表示
		echo('<pre>');
		print_r($result);
		echo('</pre>');
		exit;

	} catch (S3Exception $e) {
		print_r($e->getMessage());
	}
}
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>S3</title>
	</head>
	<body>
		<h1>S3アップロード</h1>
		<form method="post" action="/s3.php" enctype="multipart/form-data">
			<input type="file" name="source_file">
			<input type="submit">
		</form>
	</body>
</html>