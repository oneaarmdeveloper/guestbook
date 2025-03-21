<?php
  $filename="guestbook.txt";
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){
	  $name=htmlspecialchars($_POST['name']);
	  $message =htmlspecialchars($_POST['message']);
	  
	  if(!empty($name) && !empty($message)) {
		  $entry="$name: $message \n";
		  file_put_contents($filename, $entry, FILE_APPEND);
	  }
  }
  
  $entries=file_exists($filename) ? file_get_contents($filename): "No messages yet!";
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Guest Book</title>
   <style>
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
	
</head>
</head>
<body>
<h2>leave a message</h2>
<form method="POST">
 Name: <input type="text" name="name" required><br><br>
 message: <textarea name="message" required></textarea><br><br>
 <button type="submit">Submit</button>
 </form>
 <h2>messages: </h2>
 <pre><?php echo $entries;?></pre>
 </body>
 </html>
 
 