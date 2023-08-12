# NOTICE!!! Initially embedded in our docs this JavaScript
# file contains elements that can help you create reproducible
# use cases in StackBlitz for instance.
# In a real project please adapt this content to your needs.
# ++++++++++++++++++++++++++++++++++++++++++

# Tooltips
document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach (tooltip) ->
  new bootstrap.Tooltip(tooltip)

# Popovers
document.querySelectorAll('[data-bs-toggle="popover"]').forEach (popover) ->
  new bootstrap.Popover(popover)

# Toasts
toastPlacement = document.getElementById('toastPlacement')
if toastPlacement
  document.getElementById('selectToastPlacement').addEventListener 'change', ->
    if not toastPlacement.dataset.originalClass
      toastPlacement.dataset.originalClass = toastPlacement.className

    toastPlacement.className = "#{toastPlacement.dataset.originalClass} #{this.value}"

document.querySelectorAll('.bd-example .toast').forEach (toastNode) ->
  toast = new bootstrap.Toast(toastNode,
    autohide: false
  )

  toast.show()

toastTrigger = document.getElementById('liveToastBtn')
toastLiveExample = document.getElementById('liveToast')

if toastTrigger
  toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener 'click', ->
    toastBootstrap.show()

# Alerts
alertPlaceholder = document.getElementById('liveAlertPlaceholder')
appendAlert = (message, type) ->
  wrapper = document.createElement('div')
  wrapper.innerHTML = """
    <div class="alert alert-#{type} alert-dismissible" role="alert">
      <div>#{message}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  """

  alertPlaceholder.append(wrapper)

alertTrigger = document.getElementById('liveAlertBtn')
if alertTrigger
  alertTrigger.addEventListener 'click', ->
    appendAlert('Nice, you triggered this alert message!', 'success')

# Carousels
document.querySelectorAll('.carousel:not([data-bs-ride="carousel"])').forEach (carousel) ->
  bootstrap.Carousel.getOrCreateInstance(carousel)

# Checks & Radios
document.querySelectorAll('.bd-example-indeterminate [type="checkbox"]').forEach (checkbox) ->
  checkbox.indeterminate = true if checkbox.id.includes('Indeterminate')

# Links
document.querySelectorAll('.bd-content [href="#"]').forEach (link) ->
  link.addEventListener 'click', (event) ->
    event.preventDefault()

# Modal
exampleModal = document.getElementById('exampleModal')
if exampleModal
  exampleModal.addEventListener 'show.bs.modal', (event) ->
    button = event.relatedTarget
    recipient = button.getAttribute('data-bs-whatever')

    modalTitle = exampleModal.querySelector('.modal-title')
    modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalTitle.textContent = "New message to #{recipient}"
    modalBodyInput.value = recipient

# Offcanvas
myOffcanvas = document.querySelectorAll('.bd-example-offcanvas .offcanvas')
if myOffcanvas
  myOffcanvas.forEach (offcanvas) ->
    offcanvas.addEventListener 'show.bs.offcanvas', (event) ->
      event.preventDefault()

