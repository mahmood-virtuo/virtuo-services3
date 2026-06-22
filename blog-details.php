<?php
/**
 * Virtuo Services — "Mainland, Free Zone, or Offshore?" interactive article.
 * Content partial: include this BETWEEN your site header and footer, e.g.
 *     <?php include __DIR__ . '/partials/uae-company-setup.php'; ?>
 * All CSS is namespaced under .vt-article, so it will not affect the rest of the page.
 * Poppins is loaded by your main.css; the <link> below is a harmless fallback.
 * CTA WhatsApp: +971 56 515 1315
 */
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,500;1,600;1,700&display=swap">
<style>
.vt-article{
    
    --ink:#040426;          
    --ink-2:#121212;        
    --ink-soft:#667594;     
    --text:#343c4d;         
    --porcelain:#F4F5FB;    
    --paper:#FFFFFF;        
    --bronze:#EE4C01;       
    --bronze-lt:#FF6A2B;    
    --teal:#0047FF;         
    --line:rgba(4,4,38,.13);
    --line-soft:rgba(4,4,38,.07);
    --disp:"Poppins",system-ui,sans-serif;
    --body:"Poppins",system-ui,sans-serif;
    --mono:"Poppins",system-ui,sans-serif;
    --maxw:980px;
  }
  .vt-article *{box-sizing:border-box}
  @media (prefers-reduced-motion:reduce){}
  .vt-article{
    margin:0;background:var(--porcelain);color:var(--text);
    font-family:var(--body);font-size:18px;line-height:1.7;
    -webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility;
  }
  .vt-article h1, .vt-article h2, .vt-article h3{color:var(--ink)}
  .vt-article .wrap{max-width:var(--maxw);margin:0 auto;padding:0 24px}
  .vt-article .eyebrow{font-family:var(--mono);font-size:12px;letter-spacing:.16em;text-transform:uppercase;color:var(--bronze);font-weight:600}
  .vt-article a{color:inherit}

  
  .vt-article #vt-progress{position:fixed;top:0;left:0;height:3px;width:0;background:var(--bronze);z-index:60;transition:width .08s linear}

  
  .vt-article .hero{background:var(--ink);color:var(--porcelain);position:relative;overflow:hidden;padding:96px 0 0}
  .vt-article .hero::after{content:"";position:absolute;left:0;right:0;bottom:88px;height:1px;background:linear-gradient(90deg,transparent,rgba(238,76,1,.6),transparent)}
  .vt-article .hero .wrap{position:relative;z-index:2}
  .vt-article .hero .eyebrow{color:var(--bronze-lt)}
  .vt-article .hero h1{
    font-family:var(--disp);font-weight:700;font-size:clamp(36px,6vw,68px);
    line-height:1.04;letter-spacing:-.02em;margin:22px 0 0;max-width:15ch;
  }
  .vt-article .hero h1 em{font-style:italic;color:var(--bronze-lt);font-weight:700}
  .vt-article .hero .sub{max-width:54ch;color:#BFC2DA;font-size:clamp(17px,2vw,20px);margin:26px 0 0;font-weight:300}
  .vt-article .hero .ledger{display:flex;flex-wrap:wrap;gap:34px;margin:52px 0 0;padding:0 0 70px}
  .vt-article .lg-item{min-width:120px}
  .vt-article .lg-num{font-family:var(--disp);font-weight:800;font-size:34px;line-height:1;color:#fff}
  .vt-article .lg-lab{font-family:var(--mono);font-size:11px;font-weight:500;letter-spacing:.1em;text-transform:uppercase;color:#8C90B8;margin-top:8px;max-width:18ch}
  .vt-article .scrollcue{font-family:var(--mono);font-size:11px;font-weight:500;letter-spacing:.2em;text-transform:uppercase;color:#7A7EA8;padding:18px 0 26px;display:flex;align-items:center;gap:10px}
  .vt-article .scrollcue span{width:34px;height:1px;background:#46497A;display:inline-block}

  
  .vt-article .skyline{position:absolute;left:0;right:0;bottom:0;height:120px;opacity:.5;z-index:1}

  
  .vt-article section{padding:72px 0}
  .vt-article .sec-head{display:flex;align-items:baseline;gap:16px;margin-bottom:10px}
  .vt-article .sec-no{font-family:var(--mono);font-size:13px;color:var(--bronze);font-weight:700;letter-spacing:.05em}
  .vt-article h2{font-family:var(--disp);font-weight:700;font-size:clamp(27px,4vw,40px);line-height:1.12;letter-spacing:-.015em;margin:6px 0 18px;max-width:22ch}
  .vt-article h2 em, .vt-article .lede em, .vt-article .prose em{font-style:italic;color:var(--bronze)}
  .vt-article h3{font-family:var(--disp);font-weight:600;font-size:23px;margin:32px 0 8px}
  .vt-article p{margin:0 0 18px}
  .vt-article .lede{font-size:clamp(19px,2.4vw,23px);line-height:1.5;color:var(--ink);max-width:42ch;font-family:var(--disp);font-weight:500}
  .vt-article .prose{max-width:64ch}
  .vt-article .prose strong{font-weight:600}
  .vt-article .muted{color:var(--ink-soft)}
  .vt-article .rule{height:1px;background:var(--line);max-width:var(--maxw);margin:0 auto}

  
  .vt-article .reveal{opacity:0;transform:translateY(18px);transition:opacity .7s ease,transform .7s ease}
  .vt-article .reveal.in{opacity:1;transform:none}
  @media (prefers-reduced-motion:reduce){.vt-article .reveal{opacity:1;transform:none;transition:none}}

  
  .vt-article .band{background:var(--ink);color:var(--porcelain)}
  .vt-article .band .eyebrow{color:var(--bronze-lt)}
  .vt-article .band h2{color:#fff}
  .vt-article .statgrid{display:grid;grid-template-columns:repeat(4,1fr);gap:1px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.12);margin-top:34px}
  .vt-article .stat{background:var(--ink);padding:26px 22px}
  .vt-article .stat .n{font-family:var(--disp);font-weight:800;font-size:clamp(30px,4vw,44px);line-height:1;color:#fff}
  .vt-article .stat .n small{font-size:.5em;color:var(--bronze-lt);font-family:var(--mono);font-weight:600;letter-spacing:.02em}
  .vt-article .stat .l{font-family:var(--mono);font-size:11px;font-weight:500;letter-spacing:.08em;text-transform:uppercase;color:#A9ACCB;margin-top:12px;line-height:1.55}
  .vt-article .stat .src{font-size:11px;color:#73769C;margin-top:6px;font-family:var(--mono);font-weight:500}
  @media(max-width:780px){.vt-article .statgrid{grid-template-columns:repeat(2,1fr)}}
  @media(max-width:440px){.vt-article .statgrid{grid-template-columns:1fr}}

  
  .vt-article .studio{background:var(--paper);border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
  .vt-article .studio .wrap{max-width:1060px}
  .vt-article .chooser{margin:30px 0 8px;border:1px solid var(--line);background:var(--porcelain)}
  .vt-article .chooser-top{padding:18px 22px;border-bottom:1px solid var(--line-soft);font-family:var(--mono);font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft)}
  .vt-article .goals{display:grid;grid-template-columns:repeat(3,1fr)}
  .vt-article .goal{appearance:none;border:0;background:transparent;text-align:left;cursor:pointer;padding:22px;border-right:1px solid var(--line-soft);font-family:var(--body);transition:background .2s}
  .vt-article .goal:last-child{border-right:0}
  .vt-article .goal:hover, .vt-article .goal:focus-visible{background:#fff;outline:none}
  .vt-article .goal .gk{font-family:var(--mono);font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--bronze);margin-bottom:8px}
  .vt-article .goal .gt{font-size:17px;color:var(--ink);line-height:1.3}
  .vt-article .goal[aria-pressed="true"]{background:var(--ink);color:#fff}
  .vt-article .goal[aria-pressed="true"] .gt{color:#fff}
  .vt-article .goal[aria-pressed="true"] .gk{color:var(--bronze-lt)}
  @media(max-width:680px){.vt-article .goals{grid-template-columns:1fr}.vt-article .goal{border-right:0;border-bottom:1px solid var(--line-soft)}}

  .vt-article .reco{font-family:var(--body);font-size:15px;color:var(--ink-soft);min-height:24px;margin:16px 2px 30px;line-height:1.5}
  .vt-article .reco b{color:var(--ink);font-weight:600}

  .vt-article .tabs{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:0}
  .vt-article .tab{appearance:none;cursor:pointer;text-align:left;background:var(--porcelain);border:1px solid var(--line);padding:22px 22px 24px;transition:transform .2s,border-color .2s,background .2s;position:relative}
  .vt-article .tab:hover{transform:translateY(-3px)}
  .vt-article .tab .tk{font-family:var(--mono);font-size:11px;letter-spacing:.12em;text-transform:uppercase;color:var(--ink-soft)}
  .vt-article .tab .tn{font-family:var(--disp);font-weight:700;font-size:24px;margin:10px 0 6px;color:var(--ink)}
  .vt-article .tab .te{font-size:14px;color:var(--ink-soft);line-height:1.45}
  .vt-article .tab[aria-selected="true"]{background:var(--ink);border-color:var(--ink)}
  .vt-article .tab[aria-selected="true"] .tk{color:var(--bronze-lt)}
  .vt-article .tab[aria-selected="true"] .tn{color:#fff}
  .vt-article .tab[aria-selected="true"] .te{color:#C9CBE6}
  .vt-article .tab[aria-selected="true"]::after{content:"";position:absolute;left:0;right:0;bottom:-1px;height:3px;background:var(--bronze)}
  @media(max-width:680px){.vt-article .tabs{grid-template-columns:1fr}}

  .vt-article .panel{border:1px solid var(--line);border-top:0;background:#fff;padding:30px 26px}
  .vt-article .panel-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:36px}
  @media(max-width:760px){.vt-article .panel-grid{grid-template-columns:1fr;gap:24px}}
  .vt-article .panel h3{margin-top:0;font-size:22px}
  .vt-article .panel .best{font-family:var(--mono);font-size:12px;letter-spacing:.06em;text-transform:uppercase;color:var(--teal);margin-bottom:14px}
  .vt-article .panel ul{margin:0;padding:0;list-style:none}
  .vt-article .panel li{padding:9px 0;border-bottom:1px solid var(--line-soft);display:flex;justify-content:space-between;gap:18px;font-size:15px}
  .vt-article .panel li:last-child{border-bottom:0}
  .vt-article .panel li .k{color:var(--ink-soft);font-family:var(--mono);font-size:12px;letter-spacing:.04em;text-transform:uppercase;flex:0 0 auto;max-width:46%}
  .vt-article .panel li .v{text-align:right;color:var(--ink);font-weight:500}

  
  .vt-article .costbox{background:var(--porcelain);border:1px solid var(--line);padding:22px}
  .vt-article .costbox .ct{font-family:var(--mono);font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--ink-soft);margin-bottom:18px}
  .vt-article .costrow{margin-bottom:20px}
  .vt-article .costrow .cl{display:flex;justify-content:space-between;font-size:13px;margin-bottom:7px;font-family:var(--mono);color:var(--ink)}
  .vt-article .track{height:12px;background:#E6E7F3;border-radius:2px;position:relative;overflow:hidden}
  .vt-article .fill{position:absolute;top:0;bottom:0;background:#C3C6E0;border-radius:2px;width:0;transition:left .8s cubic-bezier(.2,.7,.2,1),width .8s cubic-bezier(.2,.7,.2,1)}
  .vt-article .costrow.active .fill{background:var(--bronze)}
  .vt-article .costrow.active .cl{font-weight:600}
  .vt-article .axis{display:flex;justify-content:space-between;font-family:var(--mono);font-size:10px;color:var(--ink-soft);margin-top:4px}
  .vt-article .costnote{font-size:12px;color:var(--ink-soft);margin-top:14px;line-height:1.5}

  
  .vt-article .matrix-wrap{overflow-x:auto;margin-top:42px;border:1px solid var(--line)}
  .vt-article table.matrix{border-collapse:collapse;width:100%;min-width:640px;font-size:14px}
  .vt-article table.matrix th, .vt-article table.matrix td{padding:14px 16px;text-align:left;border-bottom:1px solid var(--line-soft);vertical-align:top}
  .vt-article table.matrix thead th{font-family:var(--mono);font-size:11px;letter-spacing:.08em;text-transform:uppercase;background:var(--porcelain);color:var(--ink);border-bottom:1px solid var(--line);position:relative}
  .vt-article table.matrix tbody th{font-family:var(--mono);font-size:11px;letter-spacing:.04em;text-transform:uppercase;color:var(--ink-soft);font-weight:400;width:170px}
  .vt-article table.matrix td{color:var(--ink)}
  .vt-article table.matrix col.hl, .vt-article th.hl{background:rgba(238,76,1,.09)}
  .vt-article table.matrix td.hl{background:rgba(238,76,1,.09);font-weight:500}
  .vt-article table.matrix thead th.hl{background:var(--ink);color:#fff}

  
  .vt-article .acc{border-top:1px solid var(--line);max-width:64ch}
  .vt-article .acc details{border-bottom:1px solid var(--line)}
  .vt-article .acc summary{cursor:pointer;list-style:none;padding:20px 0;display:flex;justify-content:space-between;gap:20px;font-family:var(--disp);font-size:20px;font-weight:600;align-items:center}
  .vt-article .acc summary::-webkit-details-marker{display:none}
  .vt-article .acc summary .plus{font-family:var(--mono);color:var(--bronze);font-size:22px;transition:transform .25s;flex:0 0 auto}
  .vt-article .acc details[open] summary .plus{transform:rotate(45deg)}
  .vt-article .acc .acc-body{padding:0 0 22px;color:var(--ink-soft);font-size:16px;max-width:58ch}
  .vt-article .callout{border-left:3px solid var(--bronze);background:var(--paper);padding:20px 24px;margin:26px 0;max-width:62ch;font-family:var(--disp);font-size:19px;line-height:1.45}

  
  .vt-article .cards{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:var(--line);border:1px solid var(--line);margin-top:30px}
  .vt-article .fcard{background:var(--porcelain);padding:22px}
  .vt-article .fcard .city{font-family:var(--mono);font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--bronze)}
  .vt-article .fcard .who{font-size:16px;margin:8px 0 10px;color:var(--ink)}
  .vt-article .fcard .pick{font-family:var(--disp);font-size:17px;color:var(--teal);font-weight:500}
  @media(max-width:620px){.vt-article .cards{grid-template-columns:1fr}}

  
  .vt-article .check{max-width:60ch;margin-top:10px}
  .vt-article .check .ci{display:flex;gap:14px;padding:13px 0;border-bottom:1px solid var(--line-soft);font-size:16px}
  .vt-article .check .ci .qn{font-family:var(--mono);color:var(--bronze);font-size:13px;flex:0 0 auto;padding-top:2px}

  
  .vt-article .cta{background:var(--ink);color:var(--porcelain);text-align:center}
  .vt-article .cta h2{color:#fff;margin:0 auto 16px;max-width:20ch}
  .vt-article .cta .lede{color:#C9CBE6;margin:0 auto 30px}
  .vt-article .vt-cta{display:inline-block;font-family:var(--mono);font-size:13px;letter-spacing:.08em;text-transform:uppercase;background:var(--bronze);color:#fff;padding:16px 32px;text-decoration:none;font-weight:600;transition:background .2s,transform .2s}
  .vt-article .vt-cta:hover{background:var(--bronze-lt);transform:translateY(-2px)}

  
  .vt-article .vt-colophon{background:var(--ink-2);color:#AEBBC1;padding:50px 0 60px}
  .vt-article .vt-colophon .au{font-family:var(--disp);color:#fff;font-size:20px;margin-bottom:10px}
  .vt-article .vt-colophon p{font-size:13.5px;line-height:1.7;max-width:78ch;color:#9FA2C2}
  .vt-article .vt-colophon .src{font-size:12px;color:#73769C;margin-top:18px;font-family:var(--mono);line-height:1.7}

  .vt-article :focus-visible{outline:2px solid var(--bronze);outline-offset:3px}
</style>
<div class="vt-article">
<div id="vt-progress" aria-hidden="true"></div>

<!-- HERO -->
<section class="hero">
  <div class="wrap">
    <div class="eyebrow">Virtuo Services · UAE Market Entry</div>
    <h1>Mainland, Free&nbsp;Zone, or Offshore? The setup decision more founders get <em>wrong.</em></h1>
    <p class="sub">For U.S. business owners paying heavy taxes in New York, California, Texas, Florida, Georgia, and Illinois, the UAE is no longer just a market-expansion play — it is becoming a global structuring strategy.</p>
    <div class="ledger">
      <div class="lg-item"><div class="lg-num" data-count="9800">0</div><div class="lg-lab">Net millionaire inflow to the UAE, 2025 — #1 worldwide</div></div>
      <div class="lg-item"><div class="lg-num">#1</div><div class="lg-lab">Greenfield FDI destination, 4 years running</div></div>
      <div class="lg-item"><div class="lg-num">0%</div><div class="lg-lab">UAE personal income tax</div></div>
    </div>
    <div class="scrollcue"><span></span>Scroll to read</div>
  </div>
  <svg class="skyline" viewBox="0 0 1440 120" preserveAspectRatio="none" aria-hidden="true">
    <g fill="none" stroke="#2E2E63" stroke-width="1">
      <path d="M0 120 V70 H40 V120 M70 120 V50 H100 V120 M130 120 V84 H165 V120 M200 120 V40 L218 22 L236 40 V120 M270 120 V64 H300 V120 M330 120 V30 H360 V120 M390 120 V78 H430 V120 M470 120 V54 H500 V120 M540 120 V20 L556 6 L572 20 V120 M610 120 V66 H648 V120 M690 120 V44 H720 V120 M760 120 V80 H800 V120 M840 120 V34 H872 V120 M910 120 V58 H946 V120 M990 120 V26 H1020 V120 M1060 120 V72 H1100 V120 M1140 120 V48 H1172 V120 M1210 120 V62 H1248 V120 M1290 120 V38 H1322 V120 M1360 120 V76 H1400 V120"/>
    </g>
  </svg>
</section>

<!-- INTRO -->
<section>
  <div class="wrap reveal">
    <p class="lede">Many American entrepreneurs do not move toward the UAE because their business is failing. They look at the UAE because their business is <em>working</em>.</p>
    <div class="prose" style="margin-top:26px">
      <p>The tax drag, operating costs, and regulatory pressure back home are starting to limit what comes next. I have this conversation more and more often with profitable operators in New York, Chicago, Miami, Atlanta, Dallas, Houston, Austin, Los Angeles, and San Francisco — agency owners, e-commerce brands, consultancies, trading companies, tech founders who have hit a ceiling that has nothing to do with demand and everything to do with structure.</p>
      <p>For most of them the question has quietly shifted. It is no longer <em>“Should I expand internationally?”</em> It is <em>“What is the correct UAE structure for what I’m actually trying to do?”</em> And that is where a surprising number of smart people get it wrong — not by choosing a bad jurisdiction, but by choosing the wrong <strong>type</strong> of company inside a good one.</p>
      <p class="muted">Mainland, Free Zone, and Offshore are not interchangeable tiers of the same product. They are three different tools built for three different jobs.</p>
    </div>
  </div>
</section>

<!-- DATA BAND -->
<section class="band">
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">01</span><span class="eyebrow">The pull factor</span></div>
    <h2>Why U.S. capital is moving — in its own words</h2>
    <p style="max-width:54ch;color:#C9CBE6">None of this means the U.S. is a bad place to build. It remains the largest consumer market on earth. But for a founder whose revenue is increasingly global, a fully domestic cost structure starts to feel like a tax on ambition.</p>
    <div class="statgrid">
      <div class="stat"><div class="n" data-count="9800">0</div><div class="l">Net millionaires the UAE is set to gain in 2025 — ahead of the U.S. in 2nd</div><div class="src">Henley 2025</div></div>
      <div class="stat"><div class="n"><span data-count="63">0</span><small>&nbsp;USD bn</small></div><div class="l">Private wealth projected to flow into the UAE in 2025</div><div class="src">Henley 2025</div></div>
      <div class="stat"><div class="n"><small>USD&nbsp;</small><span data-count="14.24" data-dec="2">0</span><small>&nbsp;bn</small></div><div class="l">Dubai greenfield FDI capital in 2024, up 33% year-on-year</div><div class="src">FT fDi Markets / DET</div></div>
      <div class="stat"><div class="n" data-count="158000" data-suffix="+">0</div><div class="l">UAE Golden Visas issued by Q4 2025</div><div class="src">ICP</div></div>
    </div>
    <p style="font-family:var(--mono);font-size:12px;color:#7E909A;margin-top:22px;line-height:1.7">U.S. federal corporate tax 21% · top combined corporate burden ~29.8% in highest-tax states · California top personal rate 13.3% · the U.S. was the 2nd-largest single source of Dubai’s 2024 FDI capital.</p>
  </div>
</section>

<!-- WHAT IS A LICENSE -->
<section>
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">02</span><span class="eyebrow">The foundation</span></div>
    <h2>What a UAE trade license actually is</h2>
    <div class="prose">
      <p>Before Mainland versus Free Zone versus Offshore makes any sense, you have to understand the document underneath all three: the <strong>trade license</strong>. In the UAE, the license effectively <em>is</em> the company’s operating identity. It defines four things that shape everything you do:</p>
      <p style="margin:0"><strong>What activities</strong> the company may perform · <strong>where</strong> it is registered, and therefore which market it can serve · <strong>who</strong> you can hire and sponsor · and <strong>how</strong> banks and regulators treat you.</p>
      <div class="callout">Choosing the wrong activity or jurisdiction is not paperwork. It is the single most common cause of the problems people later blame on “Dubai” — the bank account that takes months, the client you legally can’t invoice, the visa you can’t issue.</div>
    </div>
  </div>
</section>

<!-- ───── STRUCTURE STUDIO ───── -->
<section class="studio" id="vt-studio">
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">03</span><span class="eyebrow">Structure studio · interactive</span></div>
    <h2>Three tools, three jobs. Find yours.</h2>
    <p style="max-width:56ch" class="muted">Start with what you’re trying to do — the right structure tends to choose itself. Pick a goal, then compare the three side by side.</p>

    <!-- goal chooser -->
    <div class="chooser" role="group" aria-label="What is your primary goal?">
      <div class="chooser-top">What are you primarily trying to do?</div>
      <div class="goals">
        <button class="goal" data-goal="mainland" aria-pressed="false">
          <div class="gk">Goal A</div>
          <div class="gt">Serve UAE customers directly and operate on the ground</div>
        </button>
        <button class="goal" data-goal="freezone" aria-pressed="false">
          <div class="gk">Goal B</div>
          <div class="gt">Run a global or online business from a UAE base</div>
        </button>
        <button class="goal" data-goal="offshore" aria-pressed="false">
          <div class="gk">Goal C</div>
          <div class="gt">Hold assets, IP, or investments — not operate locally</div>
        </button>
      </div>
    </div>
    <p class="reco" id="vt-reco">Tip: most U.S. founders testing the market or running an international business start in a <b>Free Zone</b>.</p>

    <!-- structure tabs -->
    <div class="tabs" role="tablist" aria-label="UAE company structures">
      <button class="tab" role="tab" aria-selected="true" data-key="mainland" id="vt-tab-mainland">
        <div class="tk">Structure</div><div class="tn">Mainland</div>
        <div class="te">Maximum access to the UAE market.</div>
      </button>
      <button class="tab" role="tab" aria-selected="false" data-key="freezone" id="vt-tab-freezone">
        <div class="tk">Structure</div><div class="tn">Free Zone</div>
        <div class="te">The entry point for most global founders.</div>
      </button>
      <button class="tab" role="tab" aria-selected="false" data-key="offshore" id="vt-tab-offshore">
        <div class="tk">Structure</div><div class="tn">Offshore</div>
        <div class="te">Built for structure, not operations.</div>
      </button>
    </div>

    <!-- panel -->
    <div class="panel" role="tabpanel" aria-labelledby="vt-tab-mainland" id="vt-panel">
      <div class="panel-grid">
        <div>
          <h3 id="vt-pname">Mainland</h3>
          <div class="best" id="vt-pbest"></div>
          <p id="vt-pdesc" style="font-size:16px;color:var(--ink-soft)"></p>
          <ul id="vt-pfacts"></ul>
        </div>
        <div class="costbox">
          <div class="ct">Indicative setup cost — shared AED scale</div>
          <div class="costrow" data-key="mainland">
            <div class="cl"><span>Mainland</span><span>AED 18k – 35k+</span></div>
            <div class="track"><div class="fill" data-low="18000" data-high="35000"></div></div>
          </div>
          <div class="costrow" data-key="freezone">
            <div class="cl"><span>Free Zone</span><span>AED 6k – 20k+</span></div>
            <div class="track"><div class="fill" data-low="6000" data-high="20000"></div></div>
          </div>
          <div class="costrow" data-key="offshore">
            <div class="cl"><span>Offshore</span><span>AED 8k – 15k+</span></div>
            <div class="track"><div class="fill" data-low="8000" data-high="15000"></div></div>
          </div>
          <div class="axis"><span>AED 0</span><span>20k</span><span>40k</span></div>
          <div class="costnote">Indicative market ranges only. Final cost varies by emirate, activity, office, approvals, and visa count.</div>
        </div>
      </div>
    </div>

    <!-- full comparison matrix -->
    <div class="matrix-wrap" aria-label="Full comparison">
      <table class="matrix">
        <colgroup><col><col class="c-mainland"><col class="c-freezone"><col class="c-offshore"></colgroup>
        <thead>
          <tr>
            <th>Factor</th>
            <th data-col="mainland">Mainland</th>
            <th data-col="freezone">Free Zone</th>
            <th data-col="offshore">Offshore</th>
          </tr>
        </thead>
        <tbody>
          <tr><th>Best for</th><td data-col="mainland">Local market access, gov work, on-the-ground services</td><td data-col="freezone">Global operators, consultants, e-commerce, tech, holding</td><td data-col="offshore">Asset holding, IP, succession & international structuring</td></tr>
          <tr><th>Local UAE trading</th><td data-col="mainland">Direct, unrestricted</td><td data-col="freezone">Usually needs an extra arrangement</td><td data-col="offshore">Generally not permitted</td></tr>
          <tr><th>International trading</th><td data-col="mainland">Yes</td><td data-col="freezone">Yes — a core strength</td><td data-col="offshore">Yes, for holding / investment</td></tr>
          <tr><th>Visa eligibility</th><td data-col="mainland">Yes</td><td data-col="freezone">Yes</td><td data-col="offshore">Generally none</td></tr>
          <tr><th>Office</th><td data-col="mainland">Physical office typical</td><td data-col="freezone">Flexi-desk to full office</td><td data-col="offshore">Not applicable</td></tr>
          <tr><th>Bank account</th><td data-col="mainland">Strong, with matched activity</td><td data-col="freezone">Strong for most models</td><td data-col="offshore">Can be more difficult</td></tr>
          <tr><th>Tax position</th><td data-col="mainland">9% above AED 375k; 0% below</td><td data-col="freezone">0% on qualifying income if QFZP conditions met</td><td data-col="offshore">Depends on substance; no automatic exemption</td></tr>
          <tr><th>Ownership</th><td data-col="mainland">Up to 100% foreign (most activities)</td><td data-col="freezone">100% foreign</td><td data-col="offshore">100% foreign</td></tr>
          <tr><th>Setup speed</th><td data-col="mainland">Moderate</td><td data-col="freezone">Fast</td><td data-col="offshore">Fast</td></tr>
          <tr><th>Compliance level</th><td data-col="mainland">Higher</td><td data-col="freezone">Moderate</td><td data-col="offshore">Varies · substance scrutiny</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- TAX -->
<section>
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">04</span><span class="eyebrow">The honest part</span></div>
    <h2>The tax conversation every U.S. founder must have</h2>
    <p class="prose muted">The UAE’s tax environment is genuinely advantageous. But careless advice does the most damage here, so let’s be precise — expand each point.</p>
    <div class="acc">
      <details open>
        <summary>The UAE numbers are real <span class="plus">+</span></summary>
        <div class="acc-body">No personal income tax. Corporate tax, introduced only in June 2023, is 0% on taxable income up to AED 375,000 and 9% above it. Qualifying Free Zone Persons can keep a 0% rate on qualifying income if they meet strict conditions. A transitional Small Business Relief lets companies with revenue at or below AED 3 million elect zero taxable income for periods ending on or before 31 December 2026.</div>
      </details>
      <details>
        <summary>A UAE company does <em>not</em> switch off the IRS <span class="plus">+</span></summary>
        <div class="acc-body">The United States taxes its citizens and green-card holders on worldwide income, wherever they live and wherever the company sits. Opening a UAE entity does not change that. You must still reckon with IRS reporting, Controlled Foreign Corporation (CFC) rules, foreign bank account reporting (FBAR / FATCA), and tax residency. Anyone selling a Dubai license as an IRS off-switch is selling you a future audit.</div>
      </details>
      <details>
        <summary>So frame the advantage accurately <span class="plus">+</span></summary>
        <div class="acc-body">Not “no tax,” but: a low local tax environment layered on top of your U.S. obligations; a launchpad into the Middle East, Africa, Asia, and Europe; a fast, modern regulatory and banking system; operational savings; long-term residency and mobility; and real diversification of where your business and assets live. Built properly — with U.S. and UAE tax professionals in the room.</div>
      </details>
    </div>
  </div>
</section>

<!-- GOLDEN VISA -->
<section>
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">05</span><span class="eyebrow">Residency</span></div>
    <h2>Why the Golden Visa belongs in this conversation</h2>
    <div class="prose">
      <p>Business setup and long-term residency are two halves of the same strategy. The <strong>Golden Visa</strong> grants 10-year renewable residency without a local sponsor, with family sponsorship included — converting the UAE from a place you keep flying back to renew paperwork into a genuine base. The two most common routes for entrepreneurs:</p>
      <ul style="list-style:none;padding:0;margin:0 0 18px">
        <li style="padding:12px 0;border-bottom:1px solid var(--line-soft)"><strong>Property</strong> — at least AED 2 million (~$545,000). As of February 2026 the old 50% / AED 1M upfront rule is removed; mortgaged and approved off-plan properties now qualify if total value meets the threshold.</li>
        <li style="padding:12px 0"><strong>Skilled professional</strong> — a basic monthly salary of AED 30,000 (basic pay only), documented over time.</li>
      </ul>
      <p class="muted">One clarification: a Golden Visa is <strong>not</strong> automatic just because you open a company. It is a qualification — by investment, salary, professional standing, business ownership, or real estate — not a giveaway.</p>
    </div>
  </div>
</section>

<!-- FOUNDER MAP -->
<section>
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">06</span><span class="eyebrow">Patterns</span></div>
    <h2>Which setup fits which founder</h2>
    <p class="muted" style="max-width:50ch">Illustrative, not prescriptive — your facts decide. But these are the patterns I see most.</p>
    <div class="cards">
      <div class="fcard"><div class="city">New York</div><div class="who">Consultant expanding into MENA</div><div class="pick">Free Zone, or Mainland for local clients</div></div>
      <div class="fcard"><div class="city">California</div><div class="who">Tech / AI founder</div><div class="pick">Free Zone or specialized tech zone</div></div>
      <div class="fcard"><div class="city">Dallas · Houston</div><div class="who">Trading / import-export company</div><div class="pick">Mainland or Free Zone</div></div>
      <div class="fcard"><div class="city">Miami</div><div class="who">E-commerce brand</div><div class="pick">Free Zone entry point</div></div>
      <div class="fcard"><div class="city">Chicago</div><div class="who">Logistics business</div><div class="pick">Free Zone near ports / airports</div></div>
      <div class="fcard"><div class="city">Anywhere</div><div class="who">Real estate investor</div><div class="pick">Mainland, holding, or Golden Visa route</div></div>
    </div>
  </div>
</section>

<!-- THE MISTAKE -->
<section class="band">
  <div class="wrap reveal">
    <div class="sec-head"><span class="sec-no">07</span><span class="eyebrow">The real mistake</span></div>
    <h2>It isn’t buying the wrong license</h2>
    <p style="max-width:56ch;color:#C9CBE6">The expensive mistake is choosing <em>any</em> license before answering the questions that should come first. The founders who get hurt optimized for the cheapest setup fee and skipped the diligence that actually matters.</p>
    <div class="check">
      <div class="ci"><span class="qn">01</span>What is the precise business activity — does the license match it?</div>
      <div class="ci"><span class="qn">02</span>What are the banking requirements, and will this structure clear compliance?</div>
      <div class="ci"><span class="qn">03</span>What is the real tax exposure — UAE and U.S. side?</div>
      <div class="ci"><span class="qn">04</span>What visas do you and your team need?</div>
      <div class="ci"><span class="qn">05</span>Do you need direct UAE customer access, or are you serving the world?</div>
      <div class="ci"><span class="qn">06</span>Who is managing your U.S. reporting obligations?</div>
      <div class="ci"><span class="qn">07</span>What is the long-term exit — sale, holding, succession?</div>
      <div class="ci"><span class="qn">08</span>Is this for operations, holding, trading, consulting, or residency?</div>
    </div>
  </div>
</section>

<!-- BOTTOM LINE / CTA -->
<section class="cta">
  <div class="wrap reveal">
    <div class="eyebrow" style="color:var(--bronze-lt)">The bottom line</div>
    <h2>The UAE is not a tax story. It’s a structure story.</h2>
    <p class="lede">The entrepreneurs who benefit most aren’t the ones who rush to buy the cheapest license. They’re the ones who build the right structure from day one.</p>
    <a class="vt-cta" href="https://wa.me/971565151315" target="_blank" rel="noopener" data-cta>Talk to Virtuo Services</a>
  </div>
</section>

<div class="vt-colophon">
  <div class="wrap">
    <div class="au">Jonaid Ali Mohammad</div>
    <p>Founder of Virtuo Services — a UAE-based consultancy helping entrepreneurs, investors, and families navigate business setup, residency solutions, PRO services, immigration, digital growth, and AI automation in the Emirates.</p>
    <p class="src">Sources: U.S. tax rates — Tax Foundation (2026); Tax Cuts and Jobs Act 2017. UAE corporate tax — Federal Tax Authority, Federal Decree-Law No. 47 of 2022. Wealth migration — Henley Private Wealth Migration Report 2025. Family-office data — DIFC. FDI rankings — FT “fDi Markets” & Dubai Economy and Tourism FDI Monitor (2024). Golden Visa — UAE GDRFA / ICP & Dubai Land Department. Figures current as of mid-2026 and subject to change. Educational only — not tax or legal advice.</p>
  </div>
</div>
</div>
<script>
(function(){
  "use strict";
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* progress bar */
  var prog = document.getElementById("vt-progress");
  function onScroll(){
    var h = document.documentElement;
    var pct = h.scrollTop / (h.scrollHeight - h.clientHeight);
    prog.style.width = (pct*100) + "%";
  }
  document.addEventListener("scroll", onScroll, {passive:true}); onScroll();

  /* reveal on scroll */
  var revs = document.querySelectorAll(".reveal");
  if(reduce){ revs.forEach(function(r){r.classList.add("in");}); }
  else{
    var ro = new IntersectionObserver(function(es){
      es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add("in"); ro.unobserve(e.target);} });
    },{threshold:.12});
    revs.forEach(function(r){ ro.observe(r); });
  }

  /* count-up */
  function fmt(n,dec){
    if(dec) return n.toFixed(dec);
    return Math.round(n).toLocaleString("en-US");
  }
  function countUp(el){
    var target = parseFloat(el.getAttribute("data-count"));
    var dec = parseInt(el.getAttribute("data-dec")||"0",10);
    var suf = el.getAttribute("data-suffix")||"";
    if(reduce){ el.textContent = fmt(target,dec)+suf; return; }
    var start=null, dur=1400;
    function step(ts){
      if(!start) start=ts;
      var p=Math.min((ts-start)/dur,1);
      var e=1-Math.pow(1-p,3);
      el.textContent = fmt(target*e,dec)+(p===1?suf:"");
      if(p<1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var counts = document.querySelectorAll("[data-count]");
  var co = new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ countUp(e.target); co.unobserve(e.target);} });
  },{threshold:.6});
  counts.forEach(function(c){ co.observe(c); });

  /* ── structure data ── */
  var DATA = {
    mainland:{
      name:"Mainland",
      best:"Best for · direct UAE market access",
      desc:"Licensed by the emirate’s economic department. Built to do business inside the UAE economy without restriction — and the old 51% local-partner rule is gone for most activities.",
      facts:[["Ownership","Up to 100% foreign"],["Local trading","Direct, unrestricted"],["Visas","Yes — staff & family"],["Office","Physical office typical"],["Setup speed","Moderate"]]
    },
    freezone:{
      name:"Free Zone",
      best:"Best for · global & online operators",
      desc:"Registered inside a designated zone (DMCC, IFZA, Meydan, RAKEZ, and others). The natural starting point for foreign founders: 100% ownership, fast, cost-efficient. Selling directly into the Mainland usually needs an extra arrangement.",
      facts:[["Ownership","100% foreign"],["Strength","Consulting, e-commerce, tech, media"],["Visas","Yes — scaled packages"],["Office","Flexi-desk to full office"],["Setup speed","Fast"]]
    },
    offshore:{
      name:"Offshore",
      best:"Best for · holding & structuring",
      desc:"A different instrument entirely — for holding assets, IP, and international structuring, not active local trading. Generally no residency visas, no local staff or invoicing. Not “worse” than the others; it answers a different question.",
      facts:[["Ownership","100% foreign"],["Local trading","Generally not permitted"],["Visas","Generally none"],["Banking","Can be more demanding"],["Setup speed","Fast"]]
    }
  };

  var panel = document.getElementById("vt-panel");
  var pName = document.getElementById("vt-pname");
  var pBest = document.getElementById("vt-pbest");
  var pDesc = document.getElementById("vt-pdesc");
  var pFacts = document.getElementById("vt-pfacts");
  var tabs = Array.prototype.slice.call(document.querySelectorAll(".tab"));
  var goals = Array.prototype.slice.call(document.querySelectorAll(".goal"));
  var costrows = Array.prototype.slice.call(document.querySelectorAll(".costrow"));

  function renderPanel(key){
    var d = DATA[key];
    pName.textContent = d.name;
    pBest.textContent = d.best;
    pDesc.textContent = d.desc;
    pFacts.innerHTML = d.facts.map(function(f){
      return '<li><span class="k">'+f[0]+'</span><span class="v">'+f[1]+'</span></li>';
    }).join("");
    panel.setAttribute("aria-labelledby","vt-tab-"+key);
  }

  function highlightMatrix(key){
    document.querySelectorAll("table.matrix [data-col]").forEach(function(c){
      c.classList.toggle("hl", c.getAttribute("data-col")===key);
    });
  }
  function highlightCost(key){
    costrows.forEach(function(r){ r.classList.toggle("active", r.getAttribute("data-key")===key); });
  }

  function select(key, fromGoal){
    tabs.forEach(function(t){ t.setAttribute("aria-selected", t.getAttribute("data-key")===key ? "true":"false"); });
    renderPanel(key);
    highlightMatrix(key);
    highlightCost(key);
  }

  tabs.forEach(function(t){
    t.addEventListener("click", function(){ select(t.getAttribute("data-key")); });
    t.addEventListener("keydown", function(e){
      var i = tabs.indexOf(t);
      if(e.key==="ArrowRight"){ e.preventDefault(); tabs[(i+1)%tabs.length].focus(); tabs[(i+1)%tabs.length].click(); }
      if(e.key==="ArrowLeft"){ e.preventDefault(); tabs[(i-1+tabs.length)%tabs.length].focus(); tabs[(i-1+tabs.length)%tabs.length].click(); }
    });
  });

  var RECO = {
    mainland:'For serving UAE customers on the ground, a <b>Mainland</b> license gives direct, unrestricted local access. <span style="color:#9a9a92">Confirm activity and approvals before deciding.</span>',
    freezone:'For a global or online business, a <b>Free Zone</b> is usually the cleanest first move — 100% ownership, fast, cost-efficient. <span style="color:#9a9a92">Selling into the Mainland may need an extra step.</span>',
    offshore:'To hold assets, IP, or investments without operating locally, an <b>Offshore</b> structure fits. <span style="color:#9a9a92">Note: typically no residency visa or local trading.</span>'
  };
  var reco = document.getElementById("vt-reco");

  goals.forEach(function(g){
    g.addEventListener("click", function(){
      var key = g.getAttribute("data-goal");
      goals.forEach(function(x){ x.setAttribute("aria-pressed", x===g ? "true":"false"); });
      reco.innerHTML = RECO[key];
      select(key, true);
      document.getElementById("vt-studio").scrollIntoView({behavior: reduce?"auto":"smooth", block:"nearest"});
    });
  });

  /* cost bar fill — animate when studio enters view */
  var SCALE = 40000;
  var fillsDone = false;
  function fillBars(){
    if(fillsDone) return; fillsDone = true;
    document.querySelectorAll(".fill").forEach(function(f){
      var lo = +f.getAttribute("data-low"), hi = +f.getAttribute("data-high");
      f.style.left = (lo/SCALE*100)+"%";
      f.style.width = ((hi-lo)/SCALE*100)+"%";
    });
  }
  var costObs = new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ fillBars(); costObs.disconnect(); } });
  },{threshold:.3});
  var cb = document.querySelector(".costbox"); if(cb) costObs.observe(cb);

  /* init */
  select("mainland");
})();
</script>
