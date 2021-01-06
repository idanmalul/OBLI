<!-- Xenon Block Counter Widget -->
            <div class="row">

            <?php if($this->session->userdata('admin_type')==1){?>
                <div class="col-sm-4">
                    <div class="xe-widget xe-counter-block" data-count=".num" data-from="0" data-to="<?php if(!empty($agent)) echo count($agent); ?>" data-suffix="" data-duration="2">
                        <div class="xe-upper">
                            
                            <div class="xe-icon">
                                <i class="linecons-user"></i>
                            </div>
                            <div class="xe-label">
                                <strong class="num"></strong>
                                <!-- <span>Server uptime</span> -->
                            </div>
                            
                        </div>
                        <div class="xe-lower">
                            <div class="border"></div>
                            
                            <!-- <span>Result</span> -->
                            <strong style="font-size: 20px;">Total Agent</strong>
                        </div>
                    </div>
                    
                </div>

                <div class="col-sm-4">
                    <div class="xe-widget xe-counter-block xe-counter-block-purple" data-count=".num" data-from="0" data-to="<?php if(!empty($partner)) echo count($partner); ?>" data-duration="3">
                        <div class="xe-upper">
                            
                            <div class="xe-icon">
                                <i class="linecons-user"></i>
                            </div>
                            <div class="xe-label">
                                <strong class="num">0</strong>
                                <!-- <span>Photos Taken</span> -->
                            </div>
                            
                        </div>
                        <div class="xe-lower">
                            <div class="border"></div>
                            
                            <!-- <span>Increase</span> -->
                            <strong style="font-size: 20px;" >Total Partner</strong>
                        </div>
                    </div>
                    
                </div>
            <?php } ?>

                <div class="col-sm-4">
                    <div class="xe-widget xe-counter-block xe-counter-block-blue" data-suffix="" data-count=".num" data-from="0" data-to="<?php if(!empty($login[0]->customer)){ echo $login[0]->customer; }elseif(!empty($agent_login)){ echo $agent_login[0]->customer; } ?>" data-duration="4" data-easing="false">
                        <div class="xe-upper">
                            
                            <div class="xe-icon">
                                <i class="linecons-user"></i>
                            </div>
                            <div class="xe-label">
                                <strong class="num"></strong>
                                <!-- <span>Daily Visits</span> -->
                            </div>
                            
                        </div>
                        <div class="xe-lower">
                            <div class="border"></div>
                            
                            <!-- <span>Bounce Rate</span> -->
                            <strong style="font-size: 20px;" >Total Customer</strong>
                        </div>
                    </div>
                    
                </div>

                <!-- <div class="col-sm-3">
                
                    <div class="xe-widget xe-counter-block xe-counter-block-orange">
                        <div class="xe-upper">
                            
                            <div class="xe-icon">
                                <i class="fa-life-ring"></i>
                            </div>
                            <div class="xe-label">
                                <strong class="num">24/7</strong>
                                <span>Live Support</span>
                            </div>
                            
                        </div>
                        <div class="xe-lower">
                            <div class="border"></div>
                            
                            <span>Tickets Opened</span>
                            <strong data-count="this" data-from="0" data-to="14215" data-duration="2">0</strong>
                        </div>
                    </div>
                    
                </div> -->
            </div>

<!-- Xenon Verical Counter -->
            <div class="row">
                <div class="col-sm-3">
                    
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-yellow" data-count=".num" data-from="0" data-to="<?php if(!empty($login[0]->pending)){ echo $login[0]->pending; }elseif(!empty($agent_login)){ echo $agent_login[0]->pending; } ?>" data-decimal="," data-suffix="" data-duration="2.5">
                        <div class="xe-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        
                        <div class="xe-label">
                            <strong class="num"></strong>
                            <span style="font-size: 20px;" >Pending</span>
                        </div>
                    </div>
                    
                </div>
                 <div class="col-sm-3">
                    
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-block" data-count=".num" data-from="0" data-to="<?php if(!empty($login[0]->approved)){ echo $login[0]->approved; }elseif(!empty($agent_login)){ echo $agent_login[0]->approved; } ?>" data-suffix="" data-duration="5">
                        <div class="xe-icon">
                            <i class="fa fa-check-square"></i>
                        </div>
                        
                        <div class="xe-label">
                            <strong class="num"></strong>
                            <span style="font-size: 20px;" >Approved</span>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-sm-3">
                    
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-turquoise" data-count=".num" data-from="0" data-to="<?php if(!empty($login[0]->disbursed)){ echo $login[0]->disbursed; }elseif(!empty($agent_login)){ echo $agent_login[0]->disbursed; } ?>" data-duration="4">
                        <div class="xe-icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        
                        <div class="xe-label">
                            <strong class="num"></strong>
                            <span style="font-size: 20px;" >Disbursed</span>
                        </div>
                    </div>
                    
                </div>

                <div class="col-sm-3">
                    
                    <div class="xe-widget xe-vertical-counter xe-vertical-counter-danger" data-count=".num" data-from="0" data-to="<?php if(!empty($login[0]->rejected)){ echo $login[0]->rejected; }elseif(!empty($agent_login)){ echo $agent_login[0]->rejected; } ?>" data-decimal="," data-suffix="" data-duration="3">
                        <div class="xe-icon">
                            <i class="fa fa-close"></i>
                        </div>
                        
                        <div class="xe-label">
                            <strong class="num"></strong>
                            <span style="font-size: 20px;" >Rejected</span>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            