"use strict";

gsap.registerPlugin(ScrollTrigger);

var webStorage = function () {
  if (sessionStorage.getItem('access')) {
    gsap.set(".p-loading", {
      display: 'none',
    });

  } else {
    sessionStorage.setItem('access', 0);

    gsap.set(".p-loading__logo-text-wrapper", {
      opacity: 0,
      visibility: 'hidden',
    });
    const loadingText = document.querySelector(".p-loading__text");

    if (loadingText) {
      loadingText.querySelectorAll('br').forEach((lineBreak) => {
        lineBreak.replaceWith('\n');
      });

      const textLines = loadingText.textContent.split('\n');
      const fragment = document.createDocumentFragment();

      loadingText.textContent = '';

      textLines.forEach((line, lineIndex) => {
        Array.from(line).forEach((char) => {
          const span = document.createElement('span');
          span.className = 'p-loading__char';
          span.textContent = char;
          fragment.appendChild(span);
        });

        if (lineIndex < textLines.length - 1) {
          fragment.appendChild(document.createElement('br'));
        }
      });

      loadingText.appendChild(fragment);
    }

    gsap.set(".p-loading__text", {
      visibility: 'visible',
    });
    gsap.set(".p-loading__char", {
      opacity: 0,
      y: 6,
    });

    const loadingLogo = document.querySelector(".p-loading__logo-img");

    if (loadingLogo) {
      const logoRect = loadingLogo.getBoundingClientRect();
      const centerX = window.innerWidth / 2 - (logoRect.left + logoRect.width / 2);
      const centerY = window.innerHeight / 2 - (logoRect.top + logoRect.height / 2);
      const opening = gsap.timeline();

      // ロゴを通常位置から中央にずらしておき、最後に元の位置へ戻す
      gsap.set(loadingLogo, {
        opacity: 0,
        x: centerX,
        y: centerY,
        scale: 3,
      });

      opening.to(loadingLogo, {
        opacity: 1,
        duration: 1.5,
        delay: 0.2,
        ease: 'power2.inOut',
        scale: 1,
      }, "+=0.6");

      opening.to(loadingLogo, {
        x: 0,
        y: 0,
        duration: 1.5,
        ease: 'power2.inOut',
      });
      opening.to(".p-loading__logo-text-wrapper", {
        opacity: 1,
        visibility: 'visible',
        duration: 1.5,
        ease: 'power2.inOut',
        delay: 0.2,
      });
      opening.to(".p-loading__char", {
        opacity: 1,
        y: 0,
        duration: 0.45,
        ease: 'power2.out',
        stagger: 0.08,
        delay: 0.2,
      });
      opening.to(".p-loading", {
        opacity: 0,
        duration: 0.9,
        ease: 'power2.inOut',
      }, "+=0.4");
      opening.to(".p-loading", {
        display: 'none',
      });
    }

  }
}
webStorage();


// let ribbons = document.querySelectorAll('.js-ribbon');

// ribbons.forEach((ribbon) => {
//   gsap.fromTo(
//     ribbon,
//     {
//       clipPath: "inset(0 100% 0 0)",
//     },
//     {
//       clipPath: "inset(0 0% 0 0)",
//       duration: 3,
//       ease: 'power3.out',
//       delay: 0.5,
//       scrollTrigger: {
//         trigger: ribbon,
//         start: 'top 90%',
//       },
//     }
//   );
// });

// let newsRibbons = document.querySelectorAll('.js-news-ribbon');

// newsRibbons.forEach((newsRibbon) => {
//   gsap.fromTo(
//     newsRibbon,
//     {
//       opacity: 0,
//       clipPath: "inset(0 100% 0 0)",
//     },
//     {
//       opacity: 1,
//       clipPath: "inset(0 0% 0 0)",
//       duration: 1.5,
//       ease: 'power3.out',
//       scrollTrigger: {
//         trigger: newsRibbon,
//         start: 'top 90%',
//       },
//     }
//   );
// });

// let gridSides = document.querySelectorAll('.js-grid-side');

// gridSides.forEach((gridSide) => {
//   gsap.fromTo(
//     gridSide,
//     {
//       columnGap: 0,
//     },
//     {
//       columnGap: '109px',
//       duration: 1.5,
//       ease: 'power3.out',
//       scrollTrigger: {
//         trigger: gridSide,
//         start: 'top 90%',
//       },
//     }
//   );
// });


let pageMainTitles = document.querySelectorAll('.js-page-main-title');

pageMainTitles.forEach((pageMainTitle) => {
  const originalText = pageMainTitle.textContent || "";
  const chars = Array.from(originalText);
  const fragment = document.createDocumentFragment();

  pageMainTitle.textContent = "";

  chars.forEach((char) => {
    const span = document.createElement("span");
    span.className = "js-page-main-title-char";
    span.style.display = "inline-block";
    span.innerHTML = char === " " ? "&nbsp;" : char;
    fragment.appendChild(span);
  });

  pageMainTitle.appendChild(fragment);

  gsap.fromTo(
    pageMainTitle.querySelectorAll('.js-page-main-title-char'),
    {
      opacity: 0,
      y: 12,
    },
    {
      opacity: 1,
      y: 0,
      duration: 0.5,
      ease: 'power2.out',
      stagger: 0.08,
      scrollTrigger: {
        trigger: pageMainTitle,
        start: 'top 90%',
      },
    }
  );
});


let opacityWords = document.querySelectorAll('.js-opacity-word');

opacityWords.forEach((opacityWord) => {
  gsap.fromTo(
    opacityWord,
    {
      opacity: 0,
    },
    {
      opacity: 1,
      duration: 1,
      ease: 'power2.inOut',
      scrollTrigger: {
        trigger: opacityWord,
        start: 'top 90%',
      },
    }
  );
});

let proImages = document.querySelectorAll('.js-pro-img');

proImages.forEach((proImage) => {
  gsap.fromTo(
    proImage,
    {
      opacity: 0,
      filter: "blur(20px)",
    },
    {
      opacity: 1,
      filter: "blur(0px)",
      duration: 1,
      ease: 'power2.inOut',
      scrollTrigger: {
        trigger: proImage,
        start: 'top 90%',
      },
    }
  );
});


let shiningTitles = document.querySelectorAll('.js-shining-title');

shiningTitles.forEach((shiningTitle) => {
  shiningTitle.setAttribute('data-shining-text', shiningTitle.textContent || "");

  const shiningTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: shiningTitle,
      start: 'top 90%',
    },
  });

  shiningTimeline.fromTo(
    shiningTitle,
    {
      color: 'transparent',
      '-webkit-text-fill-color': 'transparent',
      '-webkit-text-stroke': '1.4px rgba(255, 255, 255, 0.85)',
      '--shine-x': '-130%',
      '--shine-opacity': 0,
    },
    {
      '--shine-x': '130%',
      '--shine-opacity': 1,
      duration: 1.35,
      ease: 'power2.inOut',
    }
  ).to(shiningTitle, {
    color: '#fff',
    '-webkit-text-fill-color': '#fff',
    '-webkit-text-stroke': '0.7px rgba(255, 255, 255, 0.7)',
    duration: 0.45,
    ease: 'power2.out',
  }, '-=0.5').to(shiningTitle, {
    '--shine-opacity': 0,
    duration: 0.25,
    ease: 'power2.out',
  }, '-=0.1');

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    gsap.set(shiningTitle, {
      color: '#fff',
      '-webkit-text-fill-color': '#fff',
      '-webkit-text-stroke': '0.7px rgba(255, 255, 255, 0.7)',
      '--shine-opacity': 0,
    },
    );
  }
});

const strongColumns = document.querySelectorAll('.js-column-scrub');

strongColumns.forEach((strongColumn) => {
  const strongTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: strongColumn,
      start: 'top 90%',
      end: 'bottom 90%',
    },
  });

  strongTimeline.fromTo(
    strongColumn,
    {
      gap: 0,
    },
    {
      gap: '39px',
      duration: 1.5,
      ease: 'power2.out',
    }
  );
});
const workColumns = document.querySelectorAll('.js-column-work');

workColumns.forEach((workColumn) => {
  const workTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: workColumn,
      start: 'top 90%',
      end: 'bottom 90%',
      // scrub: true,
    },
  });

  workTimeline.fromTo(
    workColumn,
    {
      gap: 0,
    },
    {
      gap: '35px',
      duration: 1.5,
      ease: 'power2.out',
    }
  );
});



let proWords = document.querySelectorAll('.js-pro-word');

proWords.forEach((proWord) => {
  gsap.fromTo(
    proWord,
    {
      "--width": 0,
      opacity: 0,
    },
    {
      "--width": 1,
      opacity: 1,
      duration: 1.5,
      ease: 'power3.out',
      stagger: 0.08,
      scrollTrigger: {
        trigger: proWord,
        start: 'top 90%',
      },
    }
  );
});



let parallaxImgs = document.querySelectorAll('.js-parallax');

parallaxImgs.forEach((parallaxImg) => {
  gsap.fromTo(
    parallaxImg.querySelector('img'),
    {
      y: -60,
    },
    {
      y: 0,
      duration: 1,
      ease: 'power2.inOut',
      scrollTrigger: {
        trigger: parallaxImg,
        start: 'top bottom',
        end: 'bottom top',
        scrub: true,
      },
    }
  );
});
