<? header('Location: http://'.preg_replace('/^m\./', '', $_SERVER['HTTP_HOST']).$_SERVER['REQUEST_URI']); ?>