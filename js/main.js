$('.dropdown').click(function() {
  $(this).children('div').toggle();
});

var canvas;

document.getElementById('fileUpload').onchange = function(e) {
  var img = new Image();
  img.onload = draw;
  img.onerror = failed;
  img.src = URL.createObjectURL(this.files[0]);

};
function draw() {
  canvas = document.getElementById('canvas');
  console.log(this)
  canvas.width = this.width;
  canvas.height = this.height;
  var ctx = canvas.getContext('2d');
  ctx.drawImage(this, 0,0);
}
function failed() {
  console.error("The provided file couldn't be loaded as an Image media");
}
function changesize(){
  console.log(canvas);
  var canvasWidth= canvas.width;
  var canvasHeight = canvas.height;
  console.log(canvasHeight);

  $('.image-size span').html(canvasWidth + 'x' + canvasHeight)
}