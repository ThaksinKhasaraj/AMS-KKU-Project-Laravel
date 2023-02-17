<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div>
          

            <div class="form-group">
                <label for="customer_id"> สรุปรายการขอเบิก <span class="text-danger">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <a href=" # " class="btn btn-primary">
                            <i class="bi bi-briefcase-fill"></i>
                        </a>
                    </div>
                    <input type="text" class="form-control" name="deptName"
                            placeholder="เบิกในนาม...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th class="align-middle"> วัสดุ </th>
                            <th class="align-middle"> ราคา </th>
                            <th class="align-middle"> จำนวน </th>
                            <th class="align-middle"> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="align-middle">
                                <br>
                            </td>

                            <td class="align-middle">
                            </td>

                            <td class="align-middle">

                            </td>

                            <td class="align-middle text-center">
                                <a href="#" wire:click.prevent=" ">
                                    <i class="bi bi-x-circle font-2xl text-danger"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="8" class="text-center">
                                <span class="text-danger">
                                    กรุณาค้นหาวัสดุ หรือ เลือกวัสดุที่ต้องการเบิก!
                                </span>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">

                        <tr class="text-primary">
                            <th> ยอดรวมสุทธิ </th>

                            <th>

                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group d-flex justify-content-center flex-wrap mb-0">
            <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i
                    class="bi bi-x"></i> รีเช็ท </button>
            <button wire:loading.attr="disabled" wire:click="proceed" type="button"
                class="btn btn-pill btn-primary"><i class="bi bi-check"></i> ส่งใบเบิก </button>
        </div>
    </div>
</div>
</div><!-- /.card -->
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>