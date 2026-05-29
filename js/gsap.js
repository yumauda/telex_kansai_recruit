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
    gsap.set(".p-loading__text", {
      opacity: 0,
      visibility: 'hidden',
      color: 'transparent',
      '-webkit-text-stroke': '0px rgba(255, 255, 255, 0)',
      textShadow: '0 0 0 rgba(255, 255, 255, 0)',
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
      opening.to(".p-loading__text", {
        visibility: 'visible',
        opacity: 1,
        '-webkit-text-stroke': '1px rgba(255, 255, 255, 1)',
        textShadow: '0 0 14px rgba(255, 255, 255, 0.5)',
        duration: 0.45,
        ease: 'power2.out',
        delay: 0.2,
      });
      opening.to(".p-loading__text", {
        x: 'random(-4, 4)',
        y: 'random(-3, 3)',
        skewX: 'random(-4, 4)',
        duration: 0.06,
        repeat: 9,
        yoyo: true,
        ease: 'sine.inOut',
      }, "<");
      opening.to(".p-loading__text", {
        x: 0,
        y: 0,
        skewX: 0,
        color: '#fff',
        '-webkit-text-stroke': '1px rgba(255, 255, 255, 0)',
        textShadow: '0 0 0 rgba(255, 255, 255, 0)',
        visibility: 'visible',
        duration: 0.9,
        ease: 'power2.out',
      });
      opening.to(".p-loading", {
        opacity: 0,
        duration: 1.5,
        ease: 'power2.inOut',
        delay: 0.2,
      }, "+=1.5");
      opening.to(".p-loading", {
        display: 'none',
      });
    }

  }
}
webStorage();







let ribbons = document.querySelectorAll('.js-ribbon');

ribbons.forEach((ribbon) => {
  gsap.fromTo(
    ribbon,
    {
      opacity: 0,
      clipPath: "inset(0 100% 0 0)",
    },
    {
      opacity: 1,
      clipPath: "inset(0 0% 0 0)",
      duration: 3,
      ease: 'power3.out',
      delay: 0.5,
      scrollTrigger: {
        trigger: ribbon,
        start: 'top 90%',
      },
    }
  );
});

let newsRibbons = document.querySelectorAll('.js-news-ribbon');

newsRibbons.forEach((newsRibbon) => {
  gsap.fromTo(
    newsRibbon,
    {
      opacity: 0,
      clipPath: "inset(0 100% 0 0)",
    },
    {
      opacity: 1,
      clipPath: "inset(0 0% 0 0)",
      duration: 1.5,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: newsRibbon,
        start: 'top 90%',
      },
    }
  );
});
let gridSides = document.querySelectorAll('.js-grid-side');

gridSides.forEach((gridSide) => {
  gsap.fromTo(
    gridSide,
    {
      columnGap: 0,
    },
    {
      columnGap: '109px',
      duration: 1.5,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: gridSide,
        start: 'top 90%',
      },
    }
  );
});


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

let clipPathFromBottom = document.querySelectorAll('.js-clip-path-from-bottom');

clipPathFromBottom.forEach((clipPathFromBottom) => {
  gsap.fromTo(
    clipPathFromBottom,
    {
      opacity: 0,
      clipPath: "inset(100% 0 0 0)",
    },
    {
      opacity: 1,
      clipPath: "inset(0% 0 0 0)",
      duration: 1.5,
      ease: 'power2.inOut',
      scrollTrigger: {
        trigger: clipPathFromBottom,
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
let proWords = document.querySelectorAll('.js-pro-word');

proWords.forEach((proWord) => {
  gsap.fromTo(
    proWord,
    {
      "--width": "0%",
      opacity: 0,
    },
    {
      "--width": "100%",
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
gsap.fromTo(".js-pro-img", {
  opacity: 0,
  scale: 0.3,
  filter: "blur(200px)",
}, {
  opacity: 1,
  scale: 1,
  filter: "blur(0px)",
  duration: 1.5,
  ease: 'power3.out',
  scrollTrigger: {
    trigger: ".js-pro-img",
    start: 'top 90%',
  },
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
