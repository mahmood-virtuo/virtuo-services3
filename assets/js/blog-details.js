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

      function renderPanel(k){ var d=DATA[k]; pName.textContent=d.name; pBest.textContent=d.best; pDesc.textContent=d.desc; pFacts.innerHTML=d.facts.map(function(f){return '<li><span class="k">'+f[0]+'</span><span class="v">'+f[1]+'</span></li>';}).join(""); }
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

      select("mainland");
    })();
