
							<?php
							 
							 if(isset($_POST['generate']))
							 {
										$type = $_POST['type'];
									
                                        $year = $_POST['year'];
                                        $month = $_POST['month'];
                                        $date = $_POST['date'];
                                        if($month==""){
                                          $range=$year;
                                        }
                                        else{
                                          $range=$year.'-'.$month.'-'.$date;
                                        }
                                       
                                        if($type=='room'){
                                   
                                            header("location:profit_reproom.php?id=$range");
                                         }
                                         elseif($type=='hall'){
                                   
                                            header("location:profit_rephall.php?id=$range");
                                         }
                                         elseif($type=='pool'){
                                   
                                            header("location:profit_reppool.php?id=$range");
                                         }
                                         elseif($type=='cafe'){
                                   
                                            header("location:profit_repcafe.php?id=$range");
                                         }
                                          

                                       


                                        // 
                                        //                    
                                                            
									
										
										
							 
							}

							?>
                        