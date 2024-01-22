                                                        <div class="modal fade" id="rejectModal" tabindex="-1"
                                                            role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Alasan Penolakan</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form id="rejectForm" method="POST"
                                                                            action="/tindak-lanjut/{{ $laporan->id }}">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="rejectionReason">Alasan
                                                                                    Penolakan:</label>
                                                                                <textarea class="form-control" id="rejectionReason" name="pesan" rows="3" required></textarea>
                                                                            </div>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Tolak
                                                                                Laporan</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
