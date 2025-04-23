<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quét Mã Vạch Bằng Camera</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
</head>

<body>

  <h2>Quét mã vạch bằng camera</h2>
  <video id="video" style="width: 100%; max-width: 500px;"></video>
  <p>Mã vạch: <span id="barcode"></span></p>

  <script>
    Quagga.init({
      inputStream: {
        name: "Live",
        type: "LiveStream",
        target: document.querySelector("#video")
      },
      decoder: {
        readers: ["ean_reader", "code_128_reader"]
      }
    }, function(err) {
      if (err) {
        console.error(err);
        return;
      }
      Quagga.start();
    });

    Quagga.onDetected(function(result) {
      let barcode = result.codeResult.code;
      document.getElementById("barcode").innerText = barcode;

      // Gửi mã vạch đến PHP
      fetch("xuly.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: "barcode=" + barcode
        })
        .then(response => response.text())
        .then(data => alert("Thông tin sản phẩm: " + data));
    });
  </script>

</body>

</html>
