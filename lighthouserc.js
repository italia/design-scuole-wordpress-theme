
module.exports = {
  ci: {
    collect: {
      // staticDistDir: './',
      url: JSON.parse(process.env.LHCI_COLLECT_URLS),
    },
    assert: {
      // assert options here
      preset: 'lighthouse:no-pwa',
      // preset: 'lighthouse:recommended',
    },
    upload: {
      target: 'lhci',
      token: process.env.LHCI_TOKEN,
      serverBaseUrl: process.env.LHCI_SERVER_URL,
      // target: 'temporary-public-storage',
    },
    server: {
      // server options here
    },
    wizard: {
      // wizard options here
    },
  },
};
