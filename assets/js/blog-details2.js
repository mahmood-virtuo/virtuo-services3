/* =========================================================
   Blog Details 2 — tabs, FAQ accordion, calculator
   Safe scoped version
   ========================================================= */

(function () {
  "use strict";

  function ready(fn) {
    if (document.readyState !== "loading") {
      fn();
    } else {
      document.addEventListener("DOMContentLoaded", fn);
    }
  }

  ready(function () {
    const page = document.querySelector("body.blog-details2-page");
    if (!page) return;

    /* -----------------------------
       Market tabs
       ----------------------------- */
    const regions = {
      mena: "<b>MENA —</b> Deep, consistent appetite for refurbished and graded devices, parts, and used electronics, with buyer networks that move volume quickly — and it sits a few hours from a UAE base, not a full trade cycle away.",
      europe:
        "<b>Europe —</b> A more regulated, higher-trust buyer base for operators who can document chain of custody and compliance properly — a market that rewards exactly the kind of grading discipline U.S. operators already practice.",
      africa:
        "<b>Africa —</b> One of the largest underserved markets for affordable mobile technology anywhere in the world. Devices that have aged out of the U.S. market still have years of resale life here.",
      sasia:
        "<b>South Asia —</b> Combines scale with strong price sensitivity — exactly the buyer profile that rewards efficient grading and routing.",
    };

    const marketGrid = document.getElementById("marketGrid");
    const marketDetail = document.getElementById("marketDetail");

    if (marketGrid && marketDetail) {
      const marketBtns = marketGrid.querySelectorAll(".market-btn");

      marketBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
          const region = btn.getAttribute("data-region");

          marketBtns.forEach(function (item) {
            item.classList.remove("active");
          });

          btn.classList.add("active");

          if (regions[region]) {
            marketDetail.innerHTML = regions[region];
          }
        });
      });
    }

    /* -----------------------------
       FAQ accordion
       ----------------------------- */
    const accItems = document.querySelectorAll(
      "body.blog-details2-page .blog-details2-content .acc-item",
    );

    if (accItems.length) {
      accItems.forEach(function (item, index) {
        const head = item.querySelector(".acc-head");
        if (!head) return;

        head.setAttribute("role", "button");
        head.setAttribute("tabindex", "0");

        function toggleItem() {
          const isOpen = item.classList.contains("open");

          accItems.forEach(function (otherItem) {
            otherItem.classList.remove("open");
          });

          if (!isOpen) {
            item.classList.add("open");
          }
        }

        head.addEventListener("click", toggleItem);

        head.addEventListener("keydown", function (event) {
          if (event.key === "Enter" || event.key === " ") {
            event.preventDefault();
            toggleItem();
          }
        });

        if (index === 0 && !document.querySelector(".acc-item.open")) {
          item.classList.add("open");
        }
      });
    }

    /* -----------------------------
       Calculator
       ----------------------------- */
    const revenueSlider = document.getElementById("revenueSlider");
    const marginSlider = document.getElementById("marginSlider");
    const usTaxSlider = document.getElementById("usTaxSlider");
    const opexSlider = document.getElementById("opexSlider");
    const uaeTaxSlider = document.getElementById("uaeTaxSlider");
    const shiftSlider = document.getElementById("shiftSlider");
    const reductionSlider = document.getElementById("reductionSlider");

    const sliders = [
      revenueSlider,
      marginSlider,
      usTaxSlider,
      opexSlider,
      uaeTaxSlider,
      shiftSlider,
      reductionSlider,
    ];

    if (!sliders.every(Boolean)) return;

    const fmt = function (n) {
      return "$" + Math.round(n).toLocaleString("en-US");
    };

    const fmtCompact = function (n) {
      if (n >= 1000000) {
        return "$" + (n / 1000000).toFixed(2) + "M";
      }

      return fmt(n);
    };

    function setText(id, value) {
      const el = document.getElementById(id);
      if (el) el.textContent = value;
    }

    function calc() {
      const revenue = Number(revenueSlider.value);
      const margin = Number(marginSlider.value) / 100;
      const usTax = Number(usTaxSlider.value) / 100;
      const opexPct = Number(opexSlider.value) / 100;
      const uaeTax = Number(uaeTaxSlider.value) / 100;
      const shift = Number(shiftSlider.value) / 100;
      const reduction = Number(reductionSlider.value) / 100;

      setText("revenueVal", fmtCompact(revenue));
      setText("marginVal", marginSlider.value + "%");
      setText("usTaxVal", usTaxSlider.value + "%");
      setText("opexVal", opexSlider.value + "%");
      setText("uaeTaxVal", uaeTaxSlider.value + "%");
      setText("shiftVal", shiftSlider.value + "%");
      setText("reductionVal", reductionSlider.value + "%");

      const profit = revenue * margin;
      const usTaxAmt = profit * usTax;
      const opexAmt = revenue * opexPct;
      const usNet = profit - usTaxAmt;

      const uaeTaxAmt = profit * uaeTax;
      const taxSavings = usTaxAmt - uaeTaxAmt;
      const shiftedOpex = opexAmt * shift;
      const opexSavings = shiftedOpex * reduction;
      const uaeNet = profit - uaeTaxAmt + opexSavings;

      const totalSavings = taxSavings + opexSavings;
      const pctRevenue = revenue > 0 ? (totalSavings / revenue) * 100 : 0;
      const profitLift = usNet > 0 ? ((uaeNet - usNet) / usNet) * 100 : 0;

      setText("usProfit", fmt(profit));
      setText("usTaxAmt", fmt(usTaxAmt));
      setText("usOpexAmt", fmt(opexAmt));
      setText("usNet", fmt(usNet));

      setText("uaeTaxAmt", fmt(uaeTaxAmt));
      setText("taxSavings", fmt(taxSavings));
      setText("opexSavings", fmt(opexSavings));
      setText("uaeNet", fmt(uaeNet));

      setText("resTotalSavings", fmt(totalSavings));
      setText("resPctRevenue", pctRevenue.toFixed(1) + "%");
      setText(
        "resProfitLift",
        (profitLift >= 0 ? "+" : "") + profitLift.toFixed(1) + "%",
      );
    }

    sliders.forEach(function (slider) {
      slider.addEventListener("input", calc);
    });

    calc();
  });
})();
