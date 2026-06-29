(function () {
  if (!document.body || !document.body.classList.contains('blog-details2-page')) {
    return;
  }

  // Region data
    const regions = {
      mena: "<b>MENA —</b> Deep, consistent appetite for refurbished and graded devices, parts, and used electronics, with buyer networks that move volume quickly — and it sits a few hours from a UAE base, not a full trade cycle away.",
      europe: "<b>Europe —</b> A more regulated, higher-trust buyer base for operators who can document chain of custody and compliance properly — a market that rewards exactly the kind of grading discipline U.S. operators already practice.",
      africa: "<b>Africa —</b> One of the largest underserved markets for affordable mobile technology anywhere in the world. Devices that have aged out of the U.S. market still have years of resale life here.",
      sasia: "<b>South Asia —</b> Combines scale with strong price sensitivity — exactly the buyer profile that rewards efficient grading and routing."
    };
  const btns = document.querySelectorAll('.market-btn');
  const detail = document.getElementById('marketDetail');
  if (detail && btns.length) {
    btns.forEach(btn=>{
      btn.addEventListener('click',()=>{
        btns.forEach(b=>b.classList.remove('active'));
        btn.classList.add('active');
        detail.innerHTML = regions[btn.dataset.region] || '';
      });
    });
  }
  
    // Accordion
    document.querySelectorAll('.acc-head').forEach(head=>{
      head.addEventListener('click',()=>{
        head.parentElement.classList.toggle('open');
      });
    });
  
    // Calculator (P&L style)
    const revenueSlider = document.getElementById('revenueSlider');
    const marginSlider = document.getElementById('marginSlider');
    const usTaxSlider = document.getElementById('usTaxSlider');
    const opexSlider = document.getElementById('opexSlider');
  const uaeTaxSlider = document.getElementById('uaeTaxSlider');
  const shiftSlider = document.getElementById('shiftSlider');
  const reductionSlider = document.getElementById('reductionSlider');
  const calculatorInputs = [revenueSlider,marginSlider,usTaxSlider,opexSlider,uaeTaxSlider,shiftSlider,reductionSlider];
  if (calculatorInputs.some(el => !el)) {
    return;
  }
  
    const fmt = n => '$' + Math.round(n).toLocaleString('en-US');
    const fmtCompact = n => {
      if (n >= 1000000) return '$' + (n/1000000).toFixed(2) + 'M';
      return fmt(n);
    };
  
    function calc(){
      const revenue = +revenueSlider.value;
      const margin = +marginSlider.value/100;
      const usTax = +usTaxSlider.value/100;
      const opexPct = +opexSlider.value/100;
      const uaeTax = +uaeTaxSlider.value/100;
      const shift = +shiftSlider.value/100;
      const reduction = +reductionSlider.value/100;
  
      document.getElementById('revenueVal').textContent = fmtCompact(revenue);
      document.getElementById('marginVal').textContent = marginSlider.value+'%';
      document.getElementById('usTaxVal').textContent = usTaxSlider.value+'%';
      document.getElementById('opexVal').textContent = opexSlider.value+'%';
      document.getElementById('uaeTaxVal').textContent = uaeTaxSlider.value+'%';
      document.getElementById('shiftVal').textContent = shiftSlider.value+'%';
      document.getElementById('reductionVal').textContent = reductionSlider.value+'%';
  
      const profit = revenue*margin;
      const usTaxAmt = profit*usTax;
      const opexAmt = revenue*opexPct;
      const usNet = profit - usTaxAmt;
  
      const uaeTaxAmt = profit*uaeTax;
      const taxSavings = usTaxAmt - uaeTaxAmt;
      const shiftedOpex = opexAmt*shift;
      const opexSavings = shiftedOpex*reduction;
      const uaeNet = profit - uaeTaxAmt + opexSavings;
  
      const totalSavings = taxSavings + opexSavings;
      const pctRevenue = (totalSavings/revenue)*100;
      const profitLift = usNet > 0 ? ((uaeNet-usNet)/usNet)*100 : 0;
  
      document.getElementById('usProfit').textContent = fmt(profit);
      document.getElementById('usTaxAmt').textContent = fmt(usTaxAmt);
      document.getElementById('usOpexAmt').textContent = fmt(opexAmt);
      document.getElementById('usNet').textContent = fmt(usNet);
  
      document.getElementById('uaeTaxAmt').textContent = fmt(uaeTaxAmt);
      document.getElementById('taxSavings').textContent = fmt(taxSavings);
      document.getElementById('opexSavings').textContent = fmt(opexSavings);
      document.getElementById('uaeNet').textContent = fmt(uaeNet);
  
      document.getElementById('resTotalSavings').textContent = fmt(totalSavings);
      document.getElementById('resPctRevenue').textContent = pctRevenue.toFixed(1)+'%';
      document.getElementById('resProfitLift').textContent = (profitLift>=0?'+':'')+profitLift.toFixed(1)+'%';
    }
    calculatorInputs
      .forEach(el=>el.addEventListener('input',calc));
    calc();
})();
