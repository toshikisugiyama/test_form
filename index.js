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
    showForm(forms[tab])
    hideForms(forms.filter(element => element !== forms[tab]))
    activateTab(tabs[tab])
    deactivateTabs(tabs.filter(element => element !== tabs[tab]))
  }, false)
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
