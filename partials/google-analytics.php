<!-- Google tag (gtag.js) -->
<?php if (empty($delayGoogleAnalyticsOnHomepage)) : ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1BKW1VKNBX"></script>
<?php endif; ?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1BKW1VKNBX');
</script>
<?php if (!empty($delayGoogleAnalyticsOnHomepage)) : ?>
<script>
  (function () {
    'use strict';

    var analyticsScriptUrl = 'https://www.googletagmanager.com/gtag/js?id=G-1BKW1VKNBX';
    var homepageAnalyticsDelay = 3500;
    var idleCallbackTimeout = 1500;
    var analyticsLoadScheduled = false;

    function loadGoogleAnalytics() {
      if (
        window.virtuoGoogleAnalyticsScriptRequested ||
        document.querySelector('script[src="' + analyticsScriptUrl + '"]')
      ) {
        return;
      }

      window.virtuoGoogleAnalyticsScriptRequested = true;

      var analyticsScript = document.createElement('script');
      analyticsScript.async = true;
      analyticsScript.src = analyticsScriptUrl;
      document.head.appendChild(analyticsScript);
    }

    function scheduleGoogleAnalyticsLoad() {
      if (analyticsLoadScheduled) {
        return;
      }

      analyticsLoadScheduled = true;

      // Homepage only: keep analytics work outside the initial critical render.
      window.setTimeout(function () {
        if (typeof window.requestIdleCallback === 'function') {
          window.requestIdleCallback(loadGoogleAnalytics, { timeout: idleCallbackTimeout });
          return;
        }

        window.setTimeout(loadGoogleAnalytics, 0);
      }, homepageAnalyticsDelay);
    }

    if (document.readyState === 'complete') {
      scheduleGoogleAnalyticsLoad();
    } else {
      window.addEventListener('load', scheduleGoogleAnalyticsLoad, { once: true });
    }
  }());
</script>
<?php endif; ?>
