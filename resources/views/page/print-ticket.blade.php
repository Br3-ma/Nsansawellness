<section>
    <div class="elementor-element elementor-element-c3b3aea aleft elementor-widget elementor-widget-wgl-double-heading">
        <div class="elementor-widget-container">
            <div class="wgl-double-heading">
                <div class="dblh__wrapper">
                    <h3 class="dblh__title-wrapper"><span
                            class="dblh__title dblh__title-1">Thank you. </span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="elementor-element elementor-element-31c058d elementor-widget__width-initial elementor-widget-tablet__width-initial elementor-widget elementor-widget-text-editor"
        data-id="31c058d" data-element_type="widget"
        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:700}"
        data-widget_type="text-editor.default">
        <div class="elementor-widget-container">
            <h3>Your Ticket Details.</h3>
            <br>
            <div>
                <p>First name: {{ $ticket->fname }} </p>
                <p>Last name:  {{ $ticket->lname }} </p>
                <p>Ticket Code: {{ $ticket->ticketcode }}  </p>
                <p>Amount: ZK  {{ $ticket->trans_amount }} </p>
            </div>

            <hr>
            <br>
            <div>
                <span>Date: {{ $ticket->created_at->toFormattedDateString() }} </span>
            </div>
        </div>
    </div>
</section>