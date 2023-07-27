let calendar = document.querySelector('#calendar');

document.addEventListener('DOMContentLoaded', function() {
  $('#calendar').fullCalendar({
      // Configuration du calendrier (ajustez selon vos besoins)
      // Consultez la documentation de FullCalendar pour plus d'options : https://fullcalendar.io/docs
  });
});

document.addEventListener('DOMContentLoaded', function() {
  // Initialiser Flatpickr
  flatpickr("#reservation-date", {
      // Options de configuration de Flatpickr (ajustez selon vos besoins)
      // Consultez la documentation de Flatpickr pour plus d'options : https://flatpickr.js.org/options/
  });
});