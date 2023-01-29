
@if(session('success'))
<script>
    showNotification(colorName = "bg-green", text ="{{session('success')}}", placementFrom = "top",
        placementAlign = "right", animateEnter = "animated rotateInDownRight", animateExit =
        "animated rotateOutDownRight")
</script>
@endif

@if(session('error'))
<script>
    showNotification(colorName = "bg-deep-orange", text ="{{session('success')}}", placementFrom = "top",
        placementAlign = "right", animateEnter = "animated rotateInDownRight", animateExit =
        "animated rotateOutDownRight")
</script>
@endif

