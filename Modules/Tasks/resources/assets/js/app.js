import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import interactionPlugin from "@fullcalendar/interaction";
import arLocale from "@fullcalendar/core/locales/ar";
import axios from "axios";

const request = axios.create({
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
});

document.addEventListener("DOMContentLoaded", function () {
    let calendarEl = document.getElementById("calendar");

    const openOffCanvas = (id = "show-event-details-action") => {
        const offcanvasElement = document.getElementById(id);
        const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
        offcanvas.show();

        return offcanvasElement;
    };

    const showEventDetails = ({title, start, end, status}, selector = 'show-event-details-action') => {
        const containers = { 'title': title, 'start-date': start, 'end-date': end };

        Object.entries(containers).forEach(([key, value]) => {
            const ele = document.querySelector(`#${selector} #${key}`);

            if (ele) {
                ele.textContent = value;
                ele.value = value;
            }
        });

    };

    let calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
        locale: arLocale,
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listWeek",
        },
        selectable: true,
        select: (evt) => console.log(evt),
        dateClick: function (info) {
            console.log(info);

            // change the day's background color just for fun
            // info.dayEl.style.backgroundColor = "#D12";
        },
        events: async function (info, successCallback, failureCallback) {

            const { data : {data}, error} = await request.post(
                calendarEventsUri,
                {
                    start: info.start.toISOString().split("T")[0],
                    end: info.end.toISOString().split("T")[0]
                }
            );

            successCallback(data);

            failureCallback(error);

        },
        eventClick: async function (info) {
            // const offCanvas = openOffCanvas();

            offCanvas.innerHTML += '<div class="text-center text-danger m-4 loading">Loading ...</div>';

            const { data : {data}, error} = await request.get(
                calendarEventDetailsUri.replace('id', info.event.id)
            );

            offCanvas.lastElementChild.remove();

            showEventDetails(data);

        }
    });

    calendar.render();
});




console.log(calendarEventsUri);

