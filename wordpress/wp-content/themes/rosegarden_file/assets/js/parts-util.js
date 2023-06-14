window.addEventListener('message', function(e) {
  const iframeWrap = document.getElementById(e.data[0]);
  const eventName = e.data[1];
  const h = e.data[2];
  switch (eventName) {
    case 'setHeight':
      iframeWrap.style.height = h + 'px';
      break;
    }
}, false);