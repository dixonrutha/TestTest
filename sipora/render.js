// Renders the business card and poster to print-ready PNG/PDF files in ./output
// Usage: node sipora/render.js
const { chromium } = require('playwright');
const path = require('path');
const fs = require('fs');

(async () => {
  const out = path.join(__dirname, 'output');
  fs.mkdirSync(out, { recursive: true });
  const browser = await chromium.launch();

  // Business card: 1050x600 px = 3.5in x 2in at 300 dpi
  const card = await browser.newPage({ viewport: { width: 1200, height: 1400 } });
  await card.goto('file://' + path.join(__dirname, 'business-card.html'));
  await card.evaluate(() => document.fonts.ready);
  await card.addStyleTag({ content: '.card{box-shadow:none!important}' });
  await (await card.$('#front')).screenshot({ path: path.join(out, 'business-card-front.png') });
  await (await card.$('#back')).screenshot({ path: path.join(out, 'business-card-back.png') });
  await card.addStyleTag({ content: 'body{padding:0;gap:0;background:#fff}.card{page-break-after:always}' });
  await card.pdf({ path: path.join(out, 'business-card.pdf'), width: '3.5in', height: '2in', printBackground: true, pageRanges: '1-2',
    margin: { top: 0, right: 0, bottom: 0, left: 0 }, scale: 336 / 1050 });

  // Business card v2 (rounded-corner style): transparent-corner PNGs + square PDF for the printer
  const v2 = await browser.newPage({ viewport: { width: 1200, height: 1400 } });
  await v2.goto('file://' + path.join(__dirname, 'business-card-v2.html'));
  await v2.evaluate(() => document.fonts.ready);
  await v2.addStyleTag({ content: 'body{background:transparent}.card{box-shadow:none!important}' });
  await (await v2.$('#front')).screenshot({ path: path.join(out, 'business-card-v2-front.png'), omitBackground: true });
  await (await v2.$('#back')).screenshot({ path: path.join(out, 'business-card-v2-back.png'), omitBackground: true });
  await v2.addStyleTag({ content: 'body{padding:0;gap:0;background:#fff}.card{border-radius:0;page-break-after:always}' });
  await v2.pdf({ path: path.join(out, 'business-card-v2.pdf'), width: '3.5in', height: '2in', printBackground: true, pageRanges: '1-2',
    margin: { top: 0, right: 0, bottom: 0, left: 0 }, scale: 336 / 1050 });

  // Mockup of the v2 cards (uses the PNGs above)
  const mock = await browser.newPage({ viewport: { width: 1400, height: 1400 } });
  await mock.goto('file://' + path.join(__dirname, 'mockup.html'));
  await mock.waitForLoadState('load');
  await (await mock.$('#scene')).screenshot({ path: path.join(out, 'business-card-v2-mockup.png') });

  // Poster: 1080x1350 rendered at 2x (2160x2700)
  const poster = await browser.newPage({ viewport: { width: 1080, height: 1350 }, deviceScaleFactor: 2 });
  await poster.goto('file://' + path.join(__dirname, 'poster.html'));
  await poster.evaluate(() => document.fonts.ready);
  await (await poster.$('#poster')).screenshot({ path: path.join(out, 'poster.png') });
  await poster.pdf({ path: path.join(out, 'poster.pdf'), width: '1080px', height: '1350px', printBackground: true,
    margin: { top: 0, right: 0, bottom: 0, left: 0 } });

  await browser.close();
  console.log('done');
})();
