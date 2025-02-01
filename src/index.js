/* Include Tailwind */
import './index.css'

import { animate } from 'motion'

const animateOptions = { duration: 0.3, ease: "easeOut" }

document.querySelectorAll('.js-accordion').forEach(accordion => {
  let activeKey = null

  accordion.querySelectorAll('.js-accordion-trigger').forEach(trigger => {
    trigger.addEventListener('click', () => {
      if (activeKey == trigger) {
        const panel = trigger.nextElementSibling
        if (!panel) return

        animate(panel, { maxHeight: 0 }, animateOptions)

        activeKey = null
      } else {
        if (activeKey != null) {
          activeKey.click()
        }

        const panel = trigger.nextElementSibling
        if (!panel) return

        animate(panel, { maxHeight: panel.children[0]?.clientHeight || `200px` }, animateOptions)

        activeKey = trigger
      }
    })
  })
})
