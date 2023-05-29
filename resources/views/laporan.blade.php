            <div class="col-lg-12" style="margin-top:2%">
                <div class="card">
                    <div class="card-header">
                        <table>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?=$l->nama?></th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>:</th>
                                <th><?=$l->email?></th>
                            </tr>
                        </table>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Aspek</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Aspek Intelegasi</td>
                                    <td><?=$ai == 1 ? "v":"";?></td>
                                    <td><?=$ai == 2 ? "v":"";?></td>
                                    <td><?=$ai == 3 ? "v":"";?></td>
                                    <td><?=$ai == 4 ? "v":"";?></td>
                                    <td><?=$ai == 5 ? "v":"";?></td>
                                </tr>
                                <tr>
                                    <td>Aspek Numerical Ability</td>
                                    <td><?=$ana == 1 ? "v":"";?></td>
                                    <td><?=$ana == 2 ? "v":"";?></td>
                                    <td><?=$ana == 3 ? "v":"";?></td>
                                    <td><?=$ana == 4 ? "v":"";?></td>
                                    <td><?=$ana == 5 ? "v":"";?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
