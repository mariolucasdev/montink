<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
    // routes to full calendar ajax
    const routeMarkEventDone = '<?= base_url('schedule/markAsComplete/') ?>'
    const routeFindAllEvents = '<?= base_url('schedule/findAllAjax') ?>'
    const routeFindEvent = '<?= base_url('schedule/findAjax') ?>'
    const routeStoreEvent = '<?= base_url('reminder/store/schedule') ?>'
    const routeUpdateEvent = '<?= base_url('reminder/update') ?>'
    const routeDeleteEvent = '<?= base_url('schedule/deleteAjax/') ?>'
	const routeProcessShow = '<?= base_url('processes/show/') ?>'
</script>

<script src="<?= base_url('assets/geral/schedule/fullcalendar.js') ?>"></script>

<script>
	// open modal to edit schedule
	function openModalEditSchedule(reminder_id) {

		$.ajax({
			url: routeFindEvent,
			dataType: 'json',
			data: {
				id: reminder_id
			},
			success: schedule => openScheduleModalEvent(reminder_id, schedule),
			error: data => console.log(data)
		});

	}
</script>
