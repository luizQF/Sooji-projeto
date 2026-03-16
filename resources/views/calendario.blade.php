@extends('layouts.app')

<!-- No body -->
<div id='calendar'>
    
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: '/api/tasks', // A rota que criamos
    });
    calendar.render();
  });
</script>
