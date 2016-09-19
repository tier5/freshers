<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.jsdelivr.net/emojione/2.2.6/lib/js/emojione.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/emojione/2.2.6/assets/css/emojione.min.css"/>
</head>
<body>

<div class="container">
  <h2>Modal Example</h2>
  <div class="column-1-2 input">
        <h3>Input:</h3>
        <input type="text" id="inputText" name="inputText" value="Hello world! &#x1f604; :smile:"/>
        <input type="button" value="Convert" onclick="convert()"/>
      </div>

      <div class="column-1-2 output">
        <h3>Output:</h3>
        <p id="outputText"></p>
        <script type="text/javascript">
          function convert() {
            var input = document.getElementById('inputText').value;
            var output = emojione.toImage(input);
            document.getElementById('outputText').innerHTML = output;
          }
        </script>
      </div>

</div>
</body>
</html>

