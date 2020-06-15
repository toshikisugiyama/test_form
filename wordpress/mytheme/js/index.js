/**
 * タブによるフォームの切り替え
 */
const tabs = [
  document.getElementById('tab-1'),
  document.getElementById('tab-2'),
  document.getElementById('tab-3'),
]
const forms = [
  document.getElementById('form-1'),
  document.getElementById('form-2'),
  document.getElementById('form-3')
]
function selectTab (tab) {
  tabs[tab].addEventListener('click', function () {
    showCurrentForm(tab)
  }, false)
}
function showCurrentForm (tab) {
  showForm(forms[tab])
  hideForms(forms.filter(element => element !== forms[tab]))
  activateTab(tabs[tab])
  deactivateTabs(tabs.filter(element => element !== tabs[tab]))
}
function showForm (form) {
  form.classList.add('active')
}
function hideForms (forms) {
  forms.forEach(element => element.classList.remove('active'))
}
function activateTab (tab) {
  tab.classList.add('active')
}
function deactivateTabs (tabs) {
  tabs.forEach(element => element.classList.remove('active'))
}
selectTab(0)
selectTab(1)
selectTab(2)

/**
 * 郵便番号入力により自動で都道府県を選択
 */
function setAdress(id) {
  const prefectureCandidates = document.getElementById(id).children
  const selectedPrefecture = [...prefectureCandidates].find(item => item.label === prefecture)
  if (selectedPrefecture !== undefined) {
    selectedPrefecture.setAttribute('selected', 'selected')
    showCurrentForm(Number(id.split('-')[1]) - 1)
  }
}
if(Object.keys(post).includes('form-2-search-address')){
  setAdress('form-2-prefecture')
} else {
  setAdress('form-3-prefecture')
}