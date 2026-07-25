<!-- Google tag (gtag.js) -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1BKW1VKNBX');
</script>
<script>
  (function () {
    'use strict';

    var analyticsScriptUrl = 'https://www.googletagmanager.com/gtag/js?id=G-1BKW1VKNBX';
    var analyticsDelay = 3500;
    var idleCallbackTimeout = 1500;

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
      if (window.virtuoGoogleAnalyticsLoadScheduled) {
        return;
      }

      window.virtuoGoogleAnalyticsLoadScheduled = true;

      window.setTimeout(function () {
        if (typeof window.requestIdleCallback === 'function') {
          window.requestIdleCallback(loadGoogleAnalytics, { timeout: idleCallbackTimeout });
          return;
        }

        window.setTimeout(loadGoogleAnalytics, 0);
      }, analyticsDelay);
    }

    if (document.readyState === 'complete') {
      scheduleGoogleAnalyticsLoad();
    } else {
      window.addEventListener('load', scheduleGoogleAnalyticsLoad, { once: true });
    }
  }());
</script>
