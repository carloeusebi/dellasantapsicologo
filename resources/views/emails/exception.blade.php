<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error</title>
</head>
<body>
<div>An exception happened on {{ now()->format('d-m-Y H:i:s') }}</div>
<br/>
<div>Message: {{ $exception->getMessage() }}</div>
<div>File: {{ $exception->getFile() }}</div>
<div>Line: {{ $exception->getLine() }}</div>
<div>Code:{{ $exception->getCode() }}</div>
</body>
</html>
