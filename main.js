function xemchitiet(id) {
  // Hiển thị modal
  var myModal = new bootstrap.Modal(document.getElementById('modal'));
  myModal.show();

  //lay du lieu cua file chitiet cho vao trong the modalbody o tren
  fetch(`chitiet.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbody").innerHTML = data;
    })
    .catch(error => {
      console.log(error)
      document.getElementById("modalbody").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}

function suataisan(id) {
  var myModal = new bootstrap.Modal(document.getElementById('modalSua'));
  myModal.show();
  fetch(`sua.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbodysua").innerHTML = data;
    })
    .catch(error => {
      console.log(error)
      document.getElementById("modalbodysua").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}

let tscanxoa = null;

function xoa(id) {
  tscanxoa = id; // luu barcode vao bien nay 
  var myModal = new bootstrap.Modal(document.getElementById('modalXoa'));
  myModal.show();
}


document.getElementById("btnXacNhanXoa").addEventListener("click", function() {
  if (tscanxoa) {
    fetch(`xoa.php?id=${tscanxoa}`)
      .then(response => response.text()) //lay du lieu xoa
      .then(data => {
        console.log(data);

        // toast xoa
        var toast = document.getElementById('toast');
        var toastBody = document.getElementById('toastbd');
        toastBody.innerHTML = "Xóa thành công";
        var toast = new bootstrap.Toast(toast);
        toast.show();

        // an modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('modalXoa'));
        if (modal) modal.hide();

        setTimeout(() => {
          location.reload();
        }, 1500);
      })
      .catch(error => {
        console.error("Lỗi:", error);
      });
  }
});

//them
function themtaisan() {
  var myModal = new bootstrap.Modal(document.getElementById('modalThem'));
  myModal.show();
  fetch(`them.php`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbodythem").innerHTML = data;
    })
    .catch(error => {
      console.log(error)
      document.getElementById("modalbodythem").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}

function thongbao(id) {
  var myModal = new bootstrap.Modal(document.getElementById('modalthongbao'));
  myModal.show();

  fetch(`thongbaohong.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbodythongbao").innerHTML = data;
    })
    .catch(error => {
      console.log(error);
      document.getElementById("modalbodythongbao").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}


// hien thi toast
document.addEventListener('DOMContentLoaded', function() {
  var toast = document.getElementById('toast');
  if (toast.innerText.trim() !== "") {
    var toast = new bootstrap.Toast(toast);
    toast.show();
  }
});

let idthongbao = null;

function xoathongbao(id) {
  idcanxoa = id; // luu barcode vao bien nay 
  var myModal = new bootstrap.Modal(document.getElementById('modalXoa'));
  myModal.show();
}


document.getElementById("btnXacNhanXoa").addEventListener("click", function() {
  if (idcanxoa) {
    fetch(`xoathongbao.php?id=${idcanxoa}`)
      .then(response => response.text()) //lay du lieu xoa
      .then(data => {
        console.log(data);

        // toast xoa
        var toast = document.getElementById('toast');
        var toastBody = document.getElementById('toastbd');
        toastBody.innerHTML = "Xóa thành công";
        var toast = new bootstrap.Toast(toast);
        toast.show();

        // an modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('modalXoa'));
        if (modal) modal.hide();

        setTimeout(() => {
          location.reload();
        }, 1500);
      })
      .catch(error => {
        console.error("Lỗi:", error);
      });
  }
});
let idxacnhan = null;

function xacnhan(id) {
  idxacnhan = id; // luu barcode vao bien nay 
  var myModal = new bootstrap.Modal(document.getElementById('modalxacnhan'));
  myModal.show();
}


document.getElementById("btnxacnhan").addEventListener("click", function() {
  if (idxacnhan) {
    fetch(`xacnhan.php?id=${idxacnhan}`)
      .then(response => response.text()) //lay du lieu xoa
      .then(data => {
        console.log(data);

        // toast xoa
        var toast = document.getElementById('toast');
        var toastBody = document.getElementById('toastbd');
        toastBody.innerHTML = "Thành công";
        var toast = new bootstrap.Toast(toast);
        toast.show();

        // an modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('modalxacnhan'));
        if (modal) modal.hide();

        setTimeout(() => {
          location.reload();
        }, 1500);
      })
      .catch(error => {
        console.error("Lỗi:", error);
      });
  }
});

function quetma() {
  // Hiển thị modal
  var myModal = new bootstrap.Modal(document.getElementById('modalscan'));
  myModal.show();

  // Load nội dung quét mã với kích thước lớn hơn
  document.getElementById("modalbodyscan").innerHTML = `
    <div class="container-fluid">
      <h4 class="text-center mb-4">Quét mã QR tài sản</h4>
      <div class="d-flex justify-content-center">
        <div id="qr-reader" style="width: 600px; max-width: 100%;"></div>
      </div>
      <div id="thong-tin-taisan" class="mt-4">
        <!-- Tài sản quét được sẽ hiện ở đây -->
      </div>
      <div class="text-center mt-3">
        <button class="btn btn-secondary" onclick="resetScanner()">
          <i class="bi bi-arrow-repeat"></i> Quét lại
        </button>
      </div>
    </div>
  `;

  // Khởi tạo scanner với khung quét hình chữ nhật rộng hơn
  const html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", 
    { 
      fps: 10, 
      qrbox: { width: 400, height: 200 } // Khung quét hình chữ nhật (rộng x cao)
    },
    /* verbose= */ false
  );

  // Biến lưu trữ scanner để có thể reset
  window.currentScanner = html5QrcodeScanner;

  function onScanSuccess(decodedText) {
    // Xóa nội dung cũ
    document.getElementById('thong-tin-taisan').innerHTML = `
      <div class="text-center">
        <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Đang tải...</span>
        </div>
        <p>Đang tải thông tin tài sản...</p>
      </div>
    `;

    // Gửi barcode lên server để lấy thông tin tài sản
    fetch(`laytaisan.php?barcode=${encodeURIComponent(decodedText)}`)
      .then(response => response.text())
      .then(html => {
        document.getElementById('thong-tin-taisan').innerHTML = html;
        // Dừng quét sau khi thành công
        html5QrcodeScanner.clear();
      })
      .catch(err => {
        document.getElementById('thong-tin-taisan').innerHTML = `
          <div class="alert alert-danger">
            Lỗi khi lấy thông tin tài sản. Mã: ${decodedText}
          </div>
        `;
      });
  }

  html5QrcodeScanner.render(onScanSuccess);
}

// Hàm reset scanner
function resetScanner() {

    quetma(); // Khởi tạo lại scanner nếu không có scanner hiện tại

}
