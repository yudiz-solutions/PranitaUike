<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        #drag-container {
            border: 1px dashed #ccc;
            padding: 10px;
        }
    </style>
    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event) {
            event.preventDefault();
            var data = event.dataTransfer.getData("text");
            event.target.appendChild(document.getElementById(data));
        }
    </script>
</head>
<body>
    <h2>Posts</h2>
    <label for="first_name">First Name*</label>
    <input type="text" name="first_name" id="first_name" required>
    
    <label for="last_name">Last Name*</label>
    <input type="text" name="last_name" id="last_name" required>
</div>

<div>
    <label for="email">Email*</label>
    <input type="text" name="email" id="email" required>
</div>

<div>
    <label for="your_message">Your Message*</label>
    <input type="textarea" name="your_message" id="your_message" required>
</div>
<div id="drag-container" draggable="true" ondragstart="drag(event)" ondragover="allowDrop(event)" ondrop="drop(event)">
</body>
</html>
