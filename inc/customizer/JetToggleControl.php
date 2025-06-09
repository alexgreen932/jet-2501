<?php
/**
 * Add hooks for RestAPI
 *
 * @package magic-jet
 */

//  dd('class Toggle');
class JetToggleControl extends WP_Customize_Control
{
    public $type = 'toggle_note';

    public function render_content()
    {
        ?>
        <style>
            .toggle-note {
                background: #f0f7ff;
                border: 1px solid #9bcaf8;
                border-radius: 5px;
                padding: 0 5px;
                margin: 10px 0;
            }

            .note-title {
                padding: 5px;
                cursor: pointer;
                font-weight: bold;
            }

            .note-content {
                display: none;
                /* overflow: hidden; */
                /* max-height: 0; */
                transition: max-height 0.3s ease;
                border-top: 1px solid #9bcaf8;
                padding: 0 5px;
            }

            .note-content.open {
                padding: 5px;
                max-height: 500px;
                /* large enough for most notes */
            }
        </style>

        <div class="toggle-note">
            <div class="note-title"><?php echo esc_html($this->label); ?></div>
            <div class="note-content"><?php echo esc_html($this->description); ?></div>
        </div>

        <script>
            //todo fix it
            (function () {
                document.querySelectorAll('.toggle-note').forEach(note => {
                    const title = note.querySelector('.note-title');
                    const content = note.querySelector('.note-content');
                    if (title && content) {
                        // let isOpen = false;
                        // console.log('is open', isOpen);
                        title.addEventListener('click', () => {
                            // content.classList.toggle('open');
                            content.style.display = content.style.display === 'block' ? 'none' : 'block';
                        //     if (!isOpen) {
                        //         isOpen = true;
                        //         content.style.display === 'block';
                        //     } else {
                        //         isOpen = false;
                        //         content.style.display === 'none';
                                
                        //     }
                        // console.log('is open', isOpen);
                        });
                    }
                });
            })();
        </script>
        <?php
    }
}

