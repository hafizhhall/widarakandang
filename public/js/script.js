// function untuk memperpendek judul
const titles = document.querySelectorAll('.card-title');
for (const title of titles) {
  const text = title.textContent;
  const words = text.split(' ');
  let shortTitle = '';

  for (const word of words) {
    if (shortTitle.length + word.length + 1 <= 40) {
      shortTitle += word + ' ';
    } else {
      break;
    }
  }
// Check if the entire title fits without truncation
  if (shortTitle.trim() === text) {
    title.textContent = shortTitle.trim();
  } else {
    title.textContent = shortTitle.trim() + '...';
  }
}

// function untuk memperpendek sub judul
const shortTitle = document.querySelectorAll('.card-text');
for(const short of shortTitle){
    const text = short.textContent;
    const words = text.split(' ');
    let shortText = '';

    for(const word of words){
        if(shortText.length + word.length + 1 <= 100){
            shortText += word +' ';
        }else{
            break;
        }
        short.textContent = shortText + '...';
}
}

// Spinner
const spinner = document.querySelector('.spinner-border');

const navLinks = document.querySelectorAll('.nav-link');

for (const navLink of navLinks) {
  navLink.addEventListener('click', () => {
    spinner.style.display = 'block';
  });
}

// close
window.addEventListener('load', () => {
    spinner.style.display = 'none';

  });

  $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    items:4,
    center:false,
    marge: true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
