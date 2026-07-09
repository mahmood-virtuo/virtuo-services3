(function(){
      var rm = window.matchMedia("(prefers-reduced-motion:reduce)").matches;
      var root = document.querySelector(".vt-article");
      if(!root) return;

      function fmt(n,d){ return d ? n.toFixed(d) : Math.round(n).toLocaleString("en-US"); }
      function cu(el){
        var t=parseFloat(el.getAttribute("data-count")), d=parseInt(el.getAttribute("data-dec")||"0",10), s=el.getAttribute("data-suffix")||"";
        if(rm){ el.textContent=fmt(t,d)+s; return; }
        var st=null;
        function step(ts){ if(!st)st=ts; var p=Math.min((ts-st)/1300,1), e=1-Math.pow(1-p,3); el.textContent=fmt(t*e,d)+(p===1?s:""); if(p<1)requestAnimationFrame(step); }
        requestAnimationFrame(step);
      }
      var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){cu(e.target);io.unobserve(e.target);}});},{threshold:.5});
      root.querySelectorAll("[data-count]").forEach(function(n){io.observe(n);});

      var rev=root.querySelectorAll(".vt-reveal");
      if(rm){ rev.forEach(function(r){r.classList.add("in");}); }
      else{ var ro=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add("in");ro.unobserve(e.target);}});},{threshold:.12}); rev.forEach(function(r){ro.observe(r);}); }

      var DATA={
        mainland:{name:"Mainland",best:"Best for — unrestricted UAE market access",desc:"Licensed by the emirate's economic department to operate inside the UAE market without restriction: local clients, contracts, storefronts, and staff. 100% foreign ownership now applies to most activities; a defined list of strategic sectors still carries additional approvals.",facts:[["Ownership","Up to 100% foreign"],["Market access","Direct, unrestricted"],["Tax","9% above AED 375k; 0% below"],["Visas","Yes — staff & family"],["Setup speed","Moderate"]]},
        freezone:{name:"Free Zone",best:"Best for — international operators & holding",desc:"100% ownership, efficient to run, and the usual base for international founders. A Qualifying Free Zone Person can hold 0% on qualifying income where substance and income conditions are met. We structure across the UAE's free zones and concentrate on three — Ajman, DAFZ, and JAFZA — covering lean setups, regulated goods, and bonded trade. Direct Mainland sales are layered in separately.",facts:[["Ownership","100% foreign"],["Tax","0% on qualifying income (QFZP)"],["We focus on","Ajman · DAFZ · JAFZA"],["Best for","Global revenue, trade, IP"],["Setup speed","Fast"]]},
        offshore:{name:"Offshore",best:"Best for — holding, IP & succession",desc:"Not a cheaper free zone — a different instrument. Built to hold equity, IP, and assets and to carry international structuring and succession, not to trade or employ locally. No residency entitlement, and banking rewards genuine substance and a clear rationale.",facts:[["Use","Holding · IP · succession"],["Local trading","Not permitted"],["Visas","Generally none"],["Banking","Substance-led"],["Setup speed","Fast"]]}
      };
      var pName=root.querySelector("#vt-pname"), pBest=root.querySelector("#vt-pbest"), pDesc=root.querySelector("#vt-pdesc"), pFacts=root.querySelector("#vt-pfacts");
      var tabs=Array.prototype.slice.call(root.querySelectorAll(".vt-tab"));
      var goals=Array.prototype.slice.call(root.querySelectorAll(".vt-goal"));
      var rows=Array.prototype.slice.call(root.querySelectorAll(".vt-costrow"));

      function renderPanel(k){ var d=DATA[k]; if(!d||!pName||!pBest||!pDesc||!pFacts) return; pName.textContent=d.name; pBest.textContent=d.best; pDesc.textContent=d.desc; pFacts.innerHTML=d.facts.map(function(f){return '<li><span class="k">'+f[0]+'</span><span class="v">'+f[1]+'</span></li>';}).join(""); }
      function hlMatrix(k){ root.querySelectorAll(".vt-matrix [data-col]").forEach(function(c){ c.classList.toggle("hl", c.getAttribute("data-col")===k); }); }
      function hlCost(k){ rows.forEach(function(r){ r.classList.toggle("active", r.getAttribute("data-key")===k); }); }
      function select(k){ tabs.forEach(function(t){ t.setAttribute("aria-selected", t.getAttribute("data-key")===k?"true":"false"); }); renderPanel(k); hlMatrix(k); hlCost(k); }

      tabs.forEach(function(t){
        t.addEventListener("click", function(){ select(t.getAttribute("data-key")); });
        t.addEventListener("keydown", function(e){
          var i=tabs.indexOf(t);
          if(e.key==="ArrowRight"){ e.preventDefault(); var n=tabs[(i+1)%tabs.length]; n.focus(); n.click(); }
          if(e.key==="ArrowLeft"){ e.preventDefault(); var n=tabs[(i-1+tabs.length)%tabs.length]; n.focus(); n.click(); }
        });
      });

      var RECO={
        mainland:"For local clients, contracts, and on-the-ground operations, a Mainland license gives direct, unrestricted access to the UAE market. The substance question is straightforward; the activity match is what to get right.",
        freezone:"For internationally-sourced revenue, a Free Zone is usually the base — 100% ownership and a 0% qualifying-income position when substance is real. The three zones we focus on are detailed just below.",
        offshore:"To hold equity, IP, or assets without operating locally, an Offshore vehicle fits — provided the structure carries genuine substance and a clear rationale. No residency entitlement and no local trading."
      };
      var reco=root.querySelector("#vt-reco");
      goals.forEach(function(g){
        g.addEventListener("click", function(){
          var k=g.getAttribute("data-goal");
          goals.forEach(function(x){ x.setAttribute("aria-pressed", x===g?"true":"false"); });
          reco.innerHTML=RECO[k];
          select(k);
        });
      });

      var ZRECO={
        ajman:"<b>Fits</b> a founder who wants a legitimate, low-overhead base — a lean operating company, a digital or e-commerce business, or a holding and IP structure that doesn't need a Dubai address to function.",
        dafz:"<b>Fits</b> regulated or high-value goods — electronics, pharmaceuticals, aviation — and founders who want airport-side logistics and a premium Dubai address with fast, flexible licensing.",
        jafza:"<b>Fits</b> physical trade at scale. Bonded status keeps goods duty-suspended until they enter the UAE market, and direct Jebel Ali Port access makes it the natural home for import/export, re-export, and manufacturing."
      };
      var zones=Array.prototype.slice.call(root.querySelectorAll(".vt-zone"));
      var zreco=root.querySelector("#vt-zone-reco");
      zones.forEach(function(z){
        z.addEventListener("click", function(){
          var k=z.getAttribute("data-zone");
          zones.forEach(function(x){ x.setAttribute("aria-pressed", x===z?"true":"false"); });
          if(zreco) zreco.innerHTML=ZRECO[k];
        });
      });

      var SCALE=40000, done=false;
      function fill(){ if(done)return; done=true; root.querySelectorAll(".vt-fill").forEach(function(f){ var lo=+f.getAttribute("data-low"), hi=+f.getAttribute("data-high"); f.style.left=(lo/SCALE*100)+"%"; f.style.width=((hi-lo)/SCALE*100)+"%"; }); }
      var cbo=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){fill();cbo.disconnect();}});},{threshold:.25});
      var cb=root.querySelector(".vt-costbox"); if(cb)cbo.observe(cb);

      if(pName&&pBest&&pDesc&&pFacts&&tabs.length){ select("mainland"); }
    })();

(function(){
      var root = document.querySelector(".blog-us-uae-relocation");
      if(!root) return;

      var cities = {
        nyc: {
          label: "New York / Manhattan",
          rows: [
            ["Price / sqft", "~$1,392", "warn"],
            ["Gross rental yield", "2-3%", "warn"],
            ["Annual property tax", "~1.0-1.9% of value", "warn"],
            ["Capital gains tax", "Federal + NY state", "warn"],
            ["State income tax", "Up to 10.9%", "warn"],
            ["Personal income tax", "Up to 37% federal", "warn"],
            ["1BR central rent/mo", "$3,500-$5,500", "warn"]
          ],
          result: "Dubai's price per square foot is <strong>roughly three times cheaper</strong> than Manhattan in the original comparison, before the tax treatment is even considered."
        },
        la: {
          label: "Los Angeles",
          rows: [
            ["Price / sqft", "~$622", "warn"],
            ["Gross rental yield", "2-3%", "warn"],
            ["Annual property tax", "~1.1% of value", "warn"],
            ["Capital gains tax", "Federal + up to 13.3%", "warn"],
            ["State income tax", "Up to 13.3%", "warn"],
            ["Landlord regulation", "Heavy", "warn"],
            ["1BR central rent/mo", "$2,500-$4,000", "warn"]
          ],
          result: "Los Angeles remains more expensive than Dubai on price per square foot in the original comparison, while California tax treatment reduces the net relocation case further."
        },
        miami: {
          label: "Miami, Florida",
          rows: [
            ["Price / sqft", "$329-$950", "warn"],
            ["Gross rental yield", "3-5% gross", "warn"],
            ["Annual property tax", "~2% of assessed value", "warn"],
            ["Insurance exposure", "Hurricane-related", "warn"],
            ["Capital gains tax", "Federal applies", "warn"],
            ["HOA / condo dues", "Significant", "warn"],
            ["1BR central rent/mo", "$2,500-$4,500", "warn"]
          ],
          result: "Miami has no state income tax, but property tax, insurance and HOA costs can cut deeply into net yield compared with Dubai."
        },
        dallas: {
          label: "Dallas, Texas",
          rows: [
            ["Price / sqft", "~$224", "warn"],
            ["State income tax", "None", "good"],
            ["Annual property tax", "~2.1-2.5% of value", "warn"],
            ["Federal income tax", "Up to 37%", "warn"],
            ["Capital gains tax", "Federal applies", "warn"],
            ["Gross rental yield", "3-5%", "warn"],
            ["Market access", "US domestic-first", "warn"]
          ],
          result: "Dallas is affordable and has no state income tax, but high annual property tax changes the long-term ownership math."
        },
        chicago: {
          label: "Chicago, Illinois",
          rows: [
            ["Price / sqft", "~$249", "warn"],
            ["Annual property tax", "~2.1% of value", "warn"],
            ["State income tax", "4.95% flat", "warn"],
            ["Federal income tax", "Up to 37%", "warn"],
            ["Capital gains tax", "Federal + state", "warn"],
            ["Gross rental yield", "3-5%", "warn"],
            ["1BR central rent/mo", "$1,800-$3,200", "warn"]
          ],
          result: "Chicago's entry price can look attractive, but recurring property tax materially changes the ownership return."
        }
      };

      var cityColumn = root.querySelector("#us-city-col");
      var resultBox = root.querySelector("#us-compare-result");
      var buttons = Array.prototype.slice.call(root.querySelectorAll(".us-city-btn"));
      if(!cityColumn||!resultBox||!buttons.length) return;

      function renderCity(key) {
        var city = cities[key] || cities.nyc;
        cityColumn.innerHTML = '<div class="us-col-label">' + city.label + '</div>' + city.rows.map(function(row){
          return '<div class="us-row"><span class="metric">' + row[0] + '</span><span class="val ' + row[2] + '">' + row[1] + '</span></div>';
        }).join("");
        resultBox.innerHTML = city.result;
      }

      buttons.forEach(function(button){
        button.addEventListener("click", function(){
          buttons.forEach(function(item){ item.setAttribute("aria-pressed", "false"); });
          button.setAttribute("aria-pressed", "true");
          renderCity(button.getAttribute("data-city"));
        });
      });
    })();

(function(){

/* UAE tax article widgets */
var root = document.querySelector(".tax-article");
if(!root) return;
var rm = window.matchMedia("(prefers-reduced-motion:reduce)").matches;
if(!rm){
  var ro = new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add("in"); ro.unobserve(e.target); }});
  },{threshold:.08});
  root.querySelectorAll(".reveal").forEach(function(el){ ro.observe(el); });
} else {
  root.querySelectorAll(".reveal").forEach(function(el){ el.classList.add("in"); });
}

/* Profile Selector */
var PROFILES = {
  freelancer:{
    label:"Freelancer / Self-employed professional",
    note:"<strong>Your taxes:</strong> Corporate Tax (if annual business turnover exceeds AED 1M, profit taxed at 9% above AED 375k) · VAT (if taxable supplies exceed AED 375k/yr) · Municipal housing fee (5% of rent, through utility bills) · <strong>Not your taxes:</strong> Excise (unless you manufacture/import harmful goods) · DMTT (unless part of a EUR 750M+ MNE) · Property transfer fee (unless buying property)"
  },
  freezone:{
    label:"Free Zone company (FZCO / FZE)",
    note:"<strong>Your taxes:</strong> Corporate Tax at 9% on non-qualifying income — 0% on qualifying income if you meet all five QFZP conditions (substance, activity, de-minimis, transfer pricing, audited accounts) · VAT if above AED 375k in taxable supplies · Customs if goods enter the mainland · Municipal housing fee on your leased office or residence · <strong>Watch out for:</strong> FTA QFZP compliance checks are more detailed in 2026. A single condition failure triggers 9% on all income for 5 years."
  },
  mainland:{
    label:"Mainland LLC / Branch",
    note:"<strong>Your taxes:</strong> Corporate Tax — 9% on profit above AED 375k (unless SBR applies) · VAT — 5% on taxable supplies above AED 375k · Customs — 5% on goods imported from outside GCC · Municipal fee — 5% of annual rent through DEWA/utility bills · Property transfer fee if buying premises · <strong>Not your taxes:</strong> DMTT (unless EUR 750M+ group) · Excise (unless manufacturing/importing harmful goods) · No personal income tax on your salary"
  },
  hnwi:{
    label:"Individual / HNWI resident",
    note:"<strong>Your taxes:</strong> Municipal housing fee — 5% of your annual rent added to utility bills · Property transfer fee — 4% of purchase price (one-time, if buying) · Tourism Dirham — AED 7–20/night when staying in hotels · VAT as a consumer on purchases · <strong>Not your taxes:</strong> Personal income tax · Capital gains tax · Inheritance / estate tax · Wealth tax · Corporate tax (unless you run a business with >AED 1M turnover)"
  },
  mne:{
    label:"Large Multinational Enterprise (EUR 750M+ revenue)",
    note:"<strong>Your taxes:</strong> Corporate Tax (9% / 0% QFZP as applicable) · VAT · Excise (if applicable) · Customs · DMTT — 15% minimum effective tax rate on UAE profits if group ETR falls below 15% · Municipal fees · <strong>Action needed:</strong> First DMTT returns for FY2025 are due by June/March 2027. If you haven't begun the GloBE data collection and ETR computation, the preparation window is closing. Engage a UAE-registered tax agent now."
  }
};

var pBtns = root.querySelectorAll(".p-btn");
var pNote = root.querySelector("#profile-note");
var taxCards = root.querySelectorAll(".tax-card");

pBtns.forEach(function(btn){
  btn.addEventListener("click", function(){
    var p = btn.getAttribute("data-profile");
    pBtns.forEach(function(b){ b.classList.remove("active"); });
    btn.classList.add("active");
    var data = PROFILES[p];
    pNote.innerHTML = data.note;
    pNote.classList.add("is-visible");
    // highlight relevant cards
    taxCards.forEach(function(card){
      var profiles = (card.getAttribute("data-profiles")||"").split(",");
      if(profiles.indexOf(p) !== -1){
        card.classList.remove("dimmed");
        card.classList.add("highlighted");
      } else {
        card.classList.add("dimmed");
        card.classList.remove("highlighted");
      }
    });
  });
});

/* Calculator */
var profitInput = root.querySelector("#calc-profit");
var revenueInput = root.querySelector("#calc-revenue");
var calcOutput = root.querySelector("#calc-output");
var entityType = "mainland";

root.querySelectorAll(".ct-btn").forEach(function(btn){
  btn.addEventListener("click", function(){
    root.querySelectorAll(".ct-btn").forEach(function(b){ b.classList.remove("active"); });
    btn.classList.add("active");
    entityType = btn.getAttribute("data-type");
    calculate();
  });
});

function fmt(n){
  if(isNaN(n)) return "—";
  return "AED " + Math.round(n).toLocaleString("en-US");
}

function calculate(){
  var profit = parseFloat(profitInput.value)||0;
  var revenue = parseFloat(revenueInput.value)||0;
  if(profit <= 0){ calcOutput.innerHTML = '<p class="tax-calc-empty">Enter your annual profit above to see your corporate tax calculation.</p>'; return; }

  var EXEMPT = 375000;
  var TAX_RATE = 0.09;
  var SBR_REVENUE = 3000000;

  // Small Business Relief check
  var sbr = revenue > 0 && revenue <= SBR_REVENUE;
  var qfzp = entityType === "freezone";

  var taxableAboveThreshold = Math.max(0, profit - EXEMPT);
  var taxDue = 0;
  var note = "";
  var method = "";

  if(sbr){
    taxDue = 0;
    method = "Small Business Relief";
    note = "Revenue ≤ AED 3M — you may elect Small Business Relief (available until 31 Dec 2026), treating all taxable income as zero. You still need to register with the FTA and file a return.";
  } else if(qfzp){
    taxDue = 0;
    method = "Free Zone QFZP (0% on qualifying income)";
    note = "This calculation assumes your income is fully qualifying and you meet all five QFZP conditions. Non-qualifying income above AED 5M or 5% of revenue would be taxed at 9%. One failed condition triggers 9% on everything for 5 years.";
  } else {
    taxDue = taxableAboveThreshold * TAX_RATE;
    method = "Standard 9% rate";
    note = "Based on the graduated rate: 0% on first AED 375,000 of profit, 9% on everything above.";
  }

  var effectiveRate = profit > 0 ? (taxDue/profit*100).toFixed(2) : 0;

  calcOutput.innerHTML =
    '<div class="cr-label">Calculation — ' + method + '</div>' +
    '<div class="cr-row"><span class="ck">Annual profit entered</span><span class="cv">' + fmt(profit) + '</span></div>' +
    '<div class="cr-row"><span class="ck">0% threshold</span><span class="cv zero">AED 375,000</span></div>' +
    '<div class="cr-row"><span class="ck">Taxable above threshold</span><span class="cv">' + fmt(Math.max(0,profit-EXEMPT)) + '</span></div>' +
    '<div class="cr-row"><span class="ck">Tax rate applied</span><span class="cv">' + (sbr||qfzp ? '0%' : '9%') + '</span></div>' +
    '<div class="cr-total"><div class="cr-total-row"><span class="tk">Tax owed</span><span class="tv">' + fmt(taxDue) + '</span></div>' +
    '<div class="cr-effective">Effective rate: ' + effectiveRate + '%</div></div>' +
    '<div class="cr-disclaimer">' + note + ' · Estimate only — based on simplified assumptions. Consult a UAE-registered tax agent for your specific filing position.</div>';
}

profitInput.addEventListener("input", calculate);
revenueInput.addEventListener("input", calculate);

/* Global rate comparison */
var RATES = {
  corporate:[
    {name:"UAE",flag:"🇦🇪",rate:9,max:40,note:"(0% below AED 375k / 0% QFZP)"},
    {name:"Singapore",flag:"🇸🇬",rate:17,max:40,note:"(effective 5–8% with incentives)"},
    {name:"UK",flag:"🇬🇧",rate:25,max:40,note:""},
    {name:"US Federal",flag:"🇺🇸",rate:21,max:40,note:"(+state: up to ~29.8% combined)"},
    {name:"Germany",flag:"🇩🇪",rate:30,max:40,note:"(federal + trade tax)"},
    {name:"France",flag:"🇫🇷",rate:25,max:40,note:""},
    {name:"OECD Avg",flag:"🌍",rate:23.58,max:40,note:"(181 jurisdictions)"}
  ],
  personal:[
    {name:"UAE",flag:"🇦🇪",rate:0,max:55,note:"(does not exist)"},
    {name:"Singapore",flag:"🇸🇬",rate:24,max:55,note:"(top marginal)"},
    {name:"UK",flag:"🇬🇧",rate:45,max:55,note:"(top marginal)"},
    {name:"US Federal",flag:"🇺🇸",rate:37,max:55,note:"(+California: +13.3%)"},
    {name:"Germany",flag:"🇩🇪",rate:45,max:55,note:"(+solidarity surcharge)"},
    {name:"France",flag:"🇫🇷",rate:45,max:55,note:"(+social charges ~17%)"},
    {name:"Denmark",flag:"🇩🇰",rate:55.9,max:55,note:"(top effective)"}
  ]
};

var currentRType = "corporate";

function renderBars(type){
  var bars = RATES[type];
  var html = bars.map(function(b){
    var pct = Math.min((b.rate/b.max)*100, 100);
    var isUAE = b.name === "UAE";
    return '<div class="rate-row' + (isUAE?' uae-row':'') + '">' +
      '<div class="rate-row-header">' +
      '<span class="rr-country"><span class="rr-flag">' + b.flag + '</span>' + b.name + (b.note?' <span class="rr-note">' + b.note + '</span>':'') + '</span>' +
      '<span class="rr-rate">' + b.rate + '%</span></div>' +
      '<div class="rate-bar-bg"><div class="rate-bar-fill' + (isUAE?' is-uae':'') + '" data-pct="' + pct + '"></div></div>' +
      '</div>';
  }).join("");
  root.querySelector("#rate-bars").innerHTML = html;
  // animate fills
  setTimeout(function(){
    root.querySelectorAll(".rate-bar-fill").forEach(function(el){
      el.style.setProperty("--tax-rate-width", el.getAttribute("data-pct") + "%");
    });
  }, 80);
}

root.querySelectorAll(".rt-btn").forEach(function(btn){
  btn.addEventListener("click", function(){
    root.querySelectorAll(".rt-btn").forEach(function(b){ b.classList.remove("active"); });
    btn.classList.add("active");
    currentRType = btn.getAttribute("data-rtype");
    renderBars(currentRType);
  });
});

// init
renderBars("corporate");

// Animate bars when visible
var barObs = new IntersectionObserver(function(es){
  es.forEach(function(e){
    if(e.isIntersecting){ renderBars(currentRType); barObs.disconnect(); }
  });
},{threshold:.3});
var barsEl = root.querySelector("#rate-bars");
if(barsEl) barObs.observe(barsEl);

})();

(function(){
  var root = document.querySelector("[data-ajman-compare]");
  if(!root) return;

  var studio = root.closest(".vt-studio");
  var tabs = Array.prototype.slice.call(root.querySelectorAll('[role="tab"]'));
  var panels = Array.prototype.slice.call(root.querySelectorAll('[role="tabpanel"]'));
  var costRows = studio
    ? Array.prototype.slice.call(studio.querySelectorAll(".vt-costrow[data-ajman-key]"))
    : [];

  if(!tabs.length || !panels.length) return;

  function selectTab(tab) {
    var key = tab.getAttribute("data-ajman-key");
    var panelId = tab.getAttribute("aria-controls");

    tabs.forEach(function(item) {
      var selected = item === tab;
      item.setAttribute("aria-selected", selected ? "true" : "false");
      item.setAttribute("tabindex", selected ? "0" : "-1");
    });

    panels.forEach(function(panel) {
      if(panel.getAttribute("id") === panelId) {
        panel.removeAttribute("hidden");
      } else {
        panel.setAttribute("hidden", "");
      }
    });

    costRows.forEach(function(row) {
      row.classList.toggle("active", row.getAttribute("data-ajman-key") === key);
    });
  }

  tabs.forEach(function(tab, index) {
    tab.addEventListener("click", function() {
      selectTab(tab);
    });

    tab.addEventListener("keydown", function(event) {
      var nextIndex = index;

      if(event.key === "ArrowRight") {
        event.preventDefault();
        nextIndex = (index + 1) % tabs.length;
      } else if(event.key === "ArrowLeft") {
        event.preventDefault();
        nextIndex = (index - 1 + tabs.length) % tabs.length;
      } else if(event.key === "Home") {
        event.preventDefault();
        nextIndex = 0;
      } else if(event.key === "End") {
        event.preventDefault();
        nextIndex = tabs.length - 1;
      } else {
        return;
      }

      tabs[nextIndex].focus();
      selectTab(tabs[nextIndex]);
    });
  });
})();
