<div id="delete-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="delete-info" class="modal-title text-center"></h5>
            </div>
            <form action="" id="delete-form" method="post">
                <div class="modal-body">
                    @method('DELETE')
                    @csrf
                    <p class="text-center">Operation will be irreversible!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-success" data-dismiss="modal"
                            onclick="formSubmit()">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
