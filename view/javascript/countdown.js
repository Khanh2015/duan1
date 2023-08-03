function redirectToPageAfterCountdown(redirectUrl, timeLeft, pageName) {
  if (document.querySelector("#thongbaothanhcong")) {
    const countdownElement = document.querySelector("#countdown");
    countdownElement.textContent = `Chuyển đến trang ${pageName} trong ${timeLeft} giây`;
    const countdownInterval = setInterval(() => {
      timeLeft--;
      countdownElement.textContent = `Chuyển đến trang ${pageName} trong ${timeLeft} giây`;
      if (timeLeft === 0) {
        clearInterval(countdownInterval);
        window.location.href = redirectUrl;
      }
    }, 1000);
  }
}
