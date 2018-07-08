$(document).ready(function(){
  var canvas = {},
      centerX = 0,
      centerY = 0,
      color = '',
      containers = document.getElementsByClassName('material-design')
      context = {},
      element = {},
      radius = 0,

  requestAnimFrame = function () {
    return (
      window.requestAnimationFrame       || 
      window.mozRequestAnimationFrame    || 
      window.oRequestAnimationFrame      || 
      window.msRequestAnimationFrame     || 
      function (callback) {
        window.setTimeout(callback, 6);
      }
    );
  } (),
    
  init = function () {
    containers = Array.prototype.slice.call(containers);
    for (var i = 0; i < containers.length; i += 1) {
      canvas = document.createElement('canvas');
      canvas.addEventListener('click', press, false);
      containers[i].appendChild(canvas);
      canvas.style.width ='100%';
      canvas.style.height='100%';
      canvas.width  = canvas.offsetWidth;
      canvas.height = canvas.offsetHeight;
    }
  },
    
  press = function (event) {
    color = event.toElement.parentElement.dataset.color;
    element = event.toElement;
    context = element.getContext('2d');
    radius = 0;
    centerX = event.offsetX;
    centerY = event.offsetY;
    context.clearRect(0, 0, element.width, element.height);
    draw();
  },
    
  clearCanvas = function(){
    $('.material-design').each(function(){
      var canva = $(this).children('canvas').get(0);
      canva.getContext('2d').clearRect(0, 0, canva.width, canva.height);
    });
  },

  draw = function () {
    function drawCircle(){
      clearCanvas();
      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = color;
      context.fill();
      radius += 25;
      if (radius < element.width + 100) {
        requestAnimFrame(drawCircle);
      }
    }
    drawCircle();
    function drawSecondCircle(){
      context.beginPath();
      context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      context.fillStyle = '#FFF';
      context.fill();
      radius += 25;
      if (radius < element.width + 100) {
        requestAnimFrame(drawSecondCircle);
      }
    }
    setTimeout(drawSecondCircle, 700);
  };
  init();
});