function onScanSuccess(decodedText, decodedResult) {
  // Handle on success condition with the decoded text or result.
  // console.log(`Scan result: ${decodedText}`, decodedResult);
  window.location.href = `{{ route('connect', ['nim' => ${decodedText}]) }}`

  html5QrcodeScanner.clear();
}

function onScanError(errorMessage) {
  alert('Scan QR Code gagal. silakan refresh halaman untuk mengulangi scanning')
}

var html5QrcodeScanner = new Html5QrcodeScanner(
  "reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);