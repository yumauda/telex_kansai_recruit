"use strict";

gsap.registerPlugin(ScrollTrigger, SplitText);


var webStorage = function () {
  if (sessionStorage.getItem('access')) {
    gsap.set(".p-loader", {
      display: "none",
    });
  } else {
    sessionStorage.setItem('access', 0);

    const opening = gsap.timeline();

    opening.fromTo(".p-loader__logo-img", {
      opacity: 0,
      scale: 2.5,
      x: () => {
        const logoLink = document.querySelector(".p-loader__logoLink");
        const textEl = document.querySelector(".p-loader__logoText");
        if (!logoLink || !textEl) return 0;
        const styles = window.getComputedStyle(logoLink);
        const gap = parseFloat(styles.gap || styles.columnGap || "0") || 0;
        const textWidth = textEl.getBoundingClientRect().width || 0;
        return (textWidth + gap) / 2;
      },
    }, {
      opacity: 1,
      duration: 3,
      ease: "power2.inOut",
    }, "-=1.5");

    opening.to(".p-loader__logo-img", {
      scale: 1,
      x: 0,
      duration: 1.0,
      ease: "power2.inOut",
    });

    opening.fromTo(".p-loader__logoText", {
      opacity: 0,
    }, {
      opacity: 1,
      duration: 0.01,
    });
    opening.fromTo(".p-loader__char", {
      opacity: 0,
      y: 6,
    }, {
      opacity: 1,
      y: 0,
      duration: 0.45,
      stagger: 0.08,
      ease: "power2.out",
    }, "<");
    // 全体をふわっと消す
    opening.to(".p-loader", {
      opacity: 0,
      duration: 0.9,
      ease: "power2.inOut",
    }, "+=0.4");
    opening.set(".p-loader", {
      display: "none",
    });

    opening.fromTo(".js-top-header", {
      opacity: 0,
      y: -100,
    }, {
      y: 0,
      opacity: 1,
      ease: "power2.inOut",
      duration: 1,
    });

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