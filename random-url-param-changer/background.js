// --- Toggle logic ---
let isActive = false;

// Set default state on install
chrome.runtime.onInstalled.addListener(() => {
  chrome.storage.local.set({ nclbsActive: false });
});

// Listen for action (browser button) clicks
chrome.action.onClicked.addListener(async (tab) => {
  isActive = !(await getActiveState());
  chrome.storage.local.set({ nclbsActive: isActive });
  updateIcon(isActive);
});

// Helper to get ON/OFF state
async function getActiveState() {
  return new Promise((resolve) => {
    chrome.storage.local.get(['nclbsActive'], (result) => {
      resolve(result.nclbsActive);
    });
  });
}

// Helper to update icon (uses default icon for both states for now)
function updateIcon(active) {
  // You can update this to use different icons if you add them
  chrome.action.setIcon({
    path: {
      "16": "icon16.png",
      "32": "icon32.png",
      "48": "icon48.png",
      "128": "icon128.png"
    }
  });
}

// --- Main logic ---
chrome.tabs.onUpdated.addListener(async (tabId, changeInfo, tab) => {
  if (changeInfo.status === 'complete' && tab.url) {
    const active = await getActiveState();
    if (!active) return;
    if (!tab.url.includes('nclbs=')) {
      chrome.scripting.executeScript({
        target: { tabId: tabId },
        function: addNclbsParam
      });
    }
  }
});

function addNclbsParam() {
  const url = new URL(window.location.href);
  if (!url.searchParams.has('nclbs')) {
    const randomValue = Math.random().toString(36).substring(2, 15);
    url.searchParams.set('nclbs', randomValue);
    window.location.replace(url.toString());
  }
}
