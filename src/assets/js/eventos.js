
const imgs=document.querySelectorAll('.articlee #imgFondo')
const imgLikes=document.querySelectorAll(".articlee .imgLike");

imgs.forEach((img, index) => {
    img.addEventListener('dblclick', () => {
      imgLikes[index].classList.add('like');
      setTimeout(() => {
        imgLikes[index].classList.remove('like');
      }, 1000);
    });
  });