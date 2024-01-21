
                     
                        <section class="c-9">
                            <form method="POST" action="index.php?act=taikhoan" class="user_information">
                                <table>
                                    <tr>
                                    
                                        <td><label for="">FullName</label></td>
                                        <td>
                                            <input class="input_infor" disabled value="<?php echo !empty($_SESSION["user"]["name"] ) ? $_SESSION["user"]["name"]  :"";?>"  type="text" name="name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Username</label>

                                        </td>
                                        <td>
                                            <input class="input_infor " disabled value="<?php echo !empty($_SESSION["user"]["user"] ) ? $_SESSION["user"]["user"]  :""; ?>"  type="text" name="username">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><label for="">Number phone</label></td>
                                        <td><input class="input_infor" value="<?php echo !empty($_SESSION["user"]["phone"] ) ? $_SESSION["user"]["phone"]  :"";?>" disabled type="text" name="tel"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Email</label></td>
                                        <td><input class="input_infor" value="<?php echo !empty($_SESSION["user"]["email"] ) ? $_SESSION["user"]["email"]  :""; ?>" disabled type="email" required name="email"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="">Address</label></td>
                                        <td><input class="input_infor" value="<?php echo !empty($_SESSION["user"]["address"] ) ? $_SESSION["user"]["address"]  :""; ?>" disabled type="text" name="address"></td>
                                    </tr
                                </table>
                                <section class="user_handle">
                                    <input type="button" name="edit" value="Chỉnh sửa">
                                    <input type="submit" name="save" value="Lưu và cập nhật">
                                </section>
                             
                            </form>
                        </section>
                    </section>
                </section>
            </main>