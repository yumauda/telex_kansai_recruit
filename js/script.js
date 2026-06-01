jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる

  var topBtn = $(".p-totop");
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing"
    );
    return false;
  });

  // スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動)

  /* $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate({ scrollTop: targetY }, time, "swing");
    return false;
  }); */
  $(function () {
    $(".p-tab__btn").on("click", function () {
      activateTab($(this));
    });
  });

  // 初期ロード時にURLパラメータをチェックし、該当するタブを開く
  const urlParams = new URLSearchParams(window.location.search);
  const tabParam = urlParams.get("tab");
  if (tabParam) {
    const targetTabButton = $(`#tabParam`);
    if (targetTabButton.length) {
      activateTab(targetTabButton);
    }
  }

  function activateTab(tabButton) {
    const tab_btn = $(".p-tab__btn");
    const tab_panel = $(".p-tab__panel");
    const tabID = "#" + tabButton.attr("aria-controls");

    tab_btn.attr("aria-selected", false).attr("aria-expanded", false);
    tabButton.attr("aria-selected", true).attr("aria-expanded", true);
    tab_panel.attr("aria-hidden", true);
    $(tabID).attr("aria-hidden", false);
  }
  $(".p-drawer-content a[href]").on("click", function () {
    closeDrawer();
  });
});

document.addEventListener("DOMContentLoaded", () => {
  setUpAccordion();
});

const setUpAccordion = () => {
  const details = document.querySelectorAll(".js-details");
  const RUNNING_VALUE = "running"; // アニメーション実行中のときに付与する予定のカスタムデータ属性の値
  const IS_OPENED_CLASS = "is-opened"; // アイコン操作用のクラス名

  details.forEach((element) => {
    const summary = element.querySelector(".js-summary");
    const content = element.querySelector(".js-content");

    summary.addEventListener("click", (event) => {
      // デフォルトの挙動を無効化
      event.preventDefault();

      // 連打防止用。アニメーション中だったらクリックイベントを受け付けないでリターンする
      if (element.dataset.animStatus === RUNNING_VALUE) {
        return;
      }

      let icon = element.children[0];
      // detailsのopen属性を判定
      if (element.open) {
        // アコーディオンを閉じるときの処理
        // アイコン操作用クラスを切り替える(クラスを取り除く)
        element.classList.toggle(IS_OPENED_CLASS);
        // アニメーションを実行
        const closingAnim = content.animate(
          closingAnimKeyframes(content),
          animTiming
        );
        // アニメーション実行中用の値を付与
        element.dataset.animStatus = RUNNING_VALUE;

        icon.classList.toggle(IS_OPENED_CLASS);
        // アニメーションの完了後に
        closingAnim.onfinish = () => {
          // open属性を取り除く
          element.removeAttribute("open");
          // アニメーション実行中用の値を取り除く
          element.dataset.animStatus = "";
        };
      } else {
        // アコーディオンを開くときの処理
        // open属性を付与
        element.setAttribute("open", "true");

        // アイコン操作用クラスを切り替える(クラスを付与)
        element.classList.toggle(IS_OPENED_CLASS);
        // アニメーションを実行
        const openingAnim = content.animate(
          openingAnimKeyframes(content),
          animTiming
        );
        // アニメーション実行中用の値を入れる
        element.dataset.animStatus = RUNNING_VALUE;

        icon.classList.toggle(IS_OPENED_CLASS);
        // アニメーション完了後にアニメーション実行中用の値を取り除く
        openingAnim.onfinish = () => {
          element.dataset.animStatus = "";
        };
      }
    });
  });
};

/**
 * アニメーションの時間とイージング
 */
const animTiming = {
  duration: 400,
  easing: "ease-out",
};

/**
 * アコーディオンを閉じるときのキーフレーム
 */
const closingAnimKeyframes = (content) => [
  {
    height: content.offsetHeight + "px", // height: "auto"だとうまく計算されないため要素の高さを指定する
    opacity: 1,
  },
  {
    height: 0,
    opacity: 0,
  },
];

/**
 * アコーディオンを開くときのキーフレーム
 */
const openingAnimKeyframes = (content) => [
  {
    height: 0,
    opacity: 0,
  },
  {
    height: content.offsetHeight + "px",
    opacity: 1,
  },
];
function closeDrawer() {
  jQuery(".p-drawer-icon").removeClass("is-active").attr("aria-expanded", "false").attr("aria-label", "メニューを開く");
  jQuery(".p-drawer-content").removeClass("is-active").attr("aria-hidden", "true");
  jQuery("body").removeClass("drawer-open");
}

jQuery(".p-drawer-icon").on("click", function (e) {
  e.preventDefault();
  const isOpen = jQuery(this).hasClass("is-active");

  if (isOpen) {
    closeDrawer();
  } else {
    jQuery(".p-drawer-icon").addClass("is-active").attr("aria-expanded", "true").attr("aria-label", "メニューを閉じる");
    jQuery(".p-drawer-content").addClass("is-active").attr("aria-hidden", "false");
    jQuery("body").addClass("drawer-open");
  }

  return false;
});

jQuery(document).on("keydown", function (e) {
  if (e.key === "Escape") {
    closeDrawer();
  }
});

jQuery(window).on("resize", function () {
  if (window.innerWidth >= 1250) {
    closeDrawer();
  }
});

document.addEventListener("DOMContentLoaded", function () {
  var headerMegaButtons = document.querySelectorAll(".p-header__nav-item--mega > .p-header__nav-link--button");
  var isPointerInteraction = false;

  headerMegaButtons.forEach(function (button) {
    button.addEventListener("pointerdown", function () {
      isPointerInteraction = true;
    });

    button.addEventListener("click", function () {
      if (isPointerInteraction) {
        button.blur();
      }

      isPointerInteraction = false;
    });
  });
});
window.addEventListener("scroll", function () {
  var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
  var element = document.querySelector(".p-footer__floating");

  if (window.innerWidth <= 768) {
    // 768px以下のデバイスでのみ動作
    if (scrollPosition > 700) {
      element.style.opacity = "1";
    } else {
      element.style.opacity = "0";
    }
  }
});
window.onload = function () {
  document.body.classList.add("fade-in");
};

let scrollPosition = 0; // スクロール位置を記録する変数

jQuery(document).ready(function ($) {
  $(".js-btn").on("click", function () {
    $(".js-news-wrapper1").slideDown();
    $(this).hide();
  });
});
jQuery(document).ready(function ($) {
  $(".js-btn2").on("click", function () {
    $(".js-news-wrapper2").slideDown();
    $(this).hide();
  });
});
jQuery(document).ready(function ($) {
  $(".js-btn3").on("click", function () {
    $(".js-news-wrapper3").slideDown();
    $(this).hide();
  });
});

jQuery(document).ready(function ($) {
  $(".p-tabNews__btn").each(function () {
    var postCount = parseInt($(this).data("post-count"), 1);
    // 表示する投稿の数を設定（例: 4）
    var displayCount = 4;

    // 投稿数が表示数以下の場合、ボタンを非表示にする
    if (postCount <= displayCount) {
      $(this).hide();
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var countTargets = document.querySelectorAll(".p-top-data-card__number, .p-data-overview-card__number");

  if (!countTargets.length) {
    return;
  }

  var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var duration = 2000;

  function parseNumberText(text) {
    var normalized = text.trim();

    if (normalized.indexOf(":") !== -1) {
      var ratioParts = normalized.split(":").map(function (part) {
        return parseFloat(part.replace(/[^\d.-]/g, ""));
      });

      if (ratioParts.every(function (value) {
        return !isNaN(value);
      })) {
        return {
          type: "ratio",
          values: ratioParts,
        };
      }
    }

    if (normalized.indexOf("億") !== -1) {
      var okuParts = normalized.split("億");
      var oku = parseInt(okuParts[0].replace(/[^\d]/g, ""), 10) || 0;
      var man = parseInt((okuParts[1] || "").replace(/[^\d]/g, ""), 10) || 0;

      return {
        type: "okuMan",
        value: oku * 10000 + man,
      };
    }

    var numericText = normalized.replace(/,/g, "");
    var value = parseFloat(numericText);

    if (isNaN(value)) {
      return null;
    }

    return {
      type: "number",
      value: value,
      decimals: (numericText.split(".")[1] || "").length,
      useComma: normalized.indexOf(",") !== -1,
    };
  }

  function formatOkuMan(value) {
    var roundedValue = Math.floor(value);
    var oku = Math.floor(roundedValue / 10000);
    var man = roundedValue % 10000;

    if (oku <= 0) {
      return man.toLocaleString("ja-JP");
    }

    return oku + "億" + man.toLocaleString("ja-JP");
  }

  function formatNumber(value, config) {
    var fixedValue = config.decimals > 0 ? value.toFixed(config.decimals) : Math.floor(value).toString();

    if (!config.useComma) {
      return fixedValue;
    }

    var parts = fixedValue.split(".");
    parts[0] = Number(parts[0]).toLocaleString("ja-JP");
    return parts.join(".");
  }

  function renderCount(element, config, progress) {
    if (config.type === "ratio") {
      element.textContent = config.values.map(function (value) {
        return Math.round(value * progress);
      }).join(" : ");
      return;
    }

    if (config.type === "okuMan") {
      element.textContent = formatOkuMan(config.value * progress);
      return;
    }

    element.textContent = formatNumber(config.value * progress, config);
  }

  function animateCount(element, config) {
    if (element.dataset.counted === "true") {
      return;
    }

    element.dataset.counted = "true";

    if (prefersReducedMotion) {
      renderCount(element, config, 1);
      return;
    }

    var startTime = null;

    function easeInOutCubic(progress) {
      return progress < 0.5
        ? 4 * progress * progress * progress
        : 1 - Math.pow(-2 * progress + 2, 3) / 2;
    }

    function tick(timestamp) {
      if (startTime === null) {
        startTime = timestamp;
      }

      var elapsed = timestamp - startTime;
      var progress = Math.min(elapsed / duration, 1);
      var easedProgress = easeInOutCubic(progress);

      renderCount(element, config, easedProgress);

      if (progress < 1) {
        requestAnimationFrame(tick);
      } else {
        renderCount(element, config, 1);
      }
    }

    requestAnimationFrame(tick);
  }

  countTargets.forEach(function (element) {
    var config = parseNumberText(element.textContent);

    if (!config) {
      return;
    }

    element.dataset.countOriginal = element.textContent;

    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
      animateCount(element, config);
      return;
    }

    element.textContent = config.type === "ratio" ? "0 : 0" : "0";
  });

  if (prefersReducedMotion || !("IntersectionObserver" in window)) {
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) {
        return;
      }

      var element = entry.target;
      var config = parseNumberText(element.dataset.countOriginal || element.textContent);

      if (config) {
        animateCount(element, config);
      }

      observer.unobserve(element);
    });
  }, {
    threshold: 0.35,
  });

  countTargets.forEach(function (element) {
    if (element.dataset.countOriginal) {
      observer.observe(element);
    }
  });
});
jQuery(".js-modal-btn").on("click", function (e) {
  e.preventDefault();
  jQuery(".p-modal").toggleClass("is-active");
  return false;
});
jQuery(".p-modal__close").on("click", function (e) {
  e.preventDefault();
  jQuery(".p-modal").removeClass("is-active");
  return false;
});
jQuery(".js-view").on("click", function (e) {
  e.preventDefault();
  jQuery(".p-digital-modal").toggleClass("is-active");
  return false;
});
jQuery(".p-digital-modal__close").on("click", function (e) {
  e.preventDefault();
  jQuery(".p-digital-modal").removeClass("is-active");
  return false;
});
