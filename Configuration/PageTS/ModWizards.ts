mod.wizards {
	newContentElement {
		wizardItems {
			plugins {
				elements {
					sessionplaner_display {
						icon = gfx/c_wiz/regular_text.gif
						title = LLL:EXT:sessionplaner/Resources/Private/Language/locallang_be.xml:tt_content.list_type_display
						description = LLL:EXT:sessionplaner/Resources/Private/Language/locallang_be.xml:tt_content.list_type_display_description
						tt_content_defValues {
							CType = list
							list_type = sessionplaner_display
						}
					}
					sessionplaner_edit {
						icon = gfx/c_wiz/regular_text.gif
						title = LLL:EXT:sessionplaner/Resources/Private/Language/locallang_be.xml:tt_content.list_type_edit
						description = LLL:EXT:sessionplaner/Resources/Private/Language/locallang_be.xml:tt_content.list_type_edit_description
						tt_content_defValues {
							CType = list
							list_type = sessionplaner_edit
						}
					}
				}
				show = *
			}
		}
	}
}