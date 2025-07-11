<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BITW Physics</title>
    <style>
        body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f0f2f5;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        }

        .form-container {
        background: white;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 500px;
        }

        h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
        }

        form input[type="text"],
        form textarea {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
        transition: 0.3s;
        }

        form textarea {
        resize: vertical;
        height: 120px;
        }

        form input:focus,
        form textarea:focus {
        outline: none;
        border-color: #4f46e5;
        box-shadow: 0 0 4px rgba(79, 70, 229, 0.4);
        }

        button {
        background-color: #4f46e5;
        color: white;
        padding: 12px;
        width: 100%;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
        }

        button:hover {
        background-color: #4338ca;
        }
    </style>
</head>
<body>
  <div class="form-container">
    <h2>Add New Experiment</h2>
    <form id="experimentForm">
      <input type="text" name="title" placeholder="Title" required />
      <textarea name="aim" placeholder="Aim of the Experiment" required></textarea>
      <input type="text" name="video_url" placeholder="YouTube Video URL (Embed Format)" required />
      <input type="text" name="experiment_no" placeholder="Experiment Number" required />
      <button type="submit">Submit</button>
    </form>
  </div>
<script>
    document.getElementById("experimentForm").addEventListener("submit", function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch("insert_exp.php", {
            method: "POST",
            body: formData
        })

        .then(res => res.text())
        .then(result => {
            if (result.includes("Success")) {
                this.reset();
                window.location.href = "admin-exp.html";
            } else {
                alert("Error adding experiment: " + result);
            }
        })
        .catch(err => alert("Request failed: " + err));
    });
</script>
</body>
</html>